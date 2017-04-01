<?php

namespace App\Http\Controllers;

use App\Http\Requests\ToCollectRequest;
use App\Http\Requests\ToCollectUpdateRequest;
use App\Http\Requests\ToCollectNotesRequest;
use App\Http\Requests\ToCollectActionRequest;
use Illuminate\Http\Request;
use App\ToCollect;
use App\ToCollectNotes;
use App\ToCollectAction;

class ToCollectController extends Controller
{
    private $destinationPath = 'uploads';


    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tocollect = ToCollect::orderBy('id', 'desc')->get();

        return view('tocollect.index', compact('tocollect'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('tocollect.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ToCollectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ToCollectRequest $request)
    {
        $title = $request->input('title');
        $description = $request->input('description');
        $price = $request->input('price');
        $image = $request->file('image');

        $destinationPath = 'uploads';
        $image->move($destinationPath,$image->getClientOriginalName());

        ToCollect::create([
            'title' => $title,
            'description' => $description,
            'price' => $price,
            'image' => $image->getClientOriginalName(),
            'status' => 0
        ]);

        return redirect()->route('tocollect.index');

    }

    public function storenote(ToCollect $row,ToCollectNotesRequest $request)
    {
        $description = $request->input('description');

        ToCollectNotes::create([
            'to_collect_id' => $row->id,
            'description' => $description
        ]);

        return redirect()->route('tocollect.show', ['row' => $row['id']]);

    }

    public function storeaction(ToCollect $row,ToCollectActionRequest $request)
    {
        $title = $request->input('title');
        $type = $request->input('type');
        $price = $request->input('price');

        ToCollectAction::create([
            'to_collect_id' => $row->id,
            'description' => $title,
            'type' => $type,
            'price' => $price
        ]);


        $ToCollectModel = new ToCollect();

        $status = $ToCollectModel->action($row->status, $type, $price);

        $row->update(['status' => $status]);


        return redirect()->route('tocollect.show', ['row' => $row['id']]);
    }

    /**
     * Show all tasks and manage
     *
     * @return \Illuminate\Http\Response
     */
    public function show(ToCollect $row, $action='')
    {
        $ToCollectModel = new ToCollect();

        $notes = ToCollectNotes::where('to_collect_id', $row->id)->orderby('id', 'DESC')->get();

        $stories = ToCollectAction::where('to_collect_id', $row->id)->orderby('id', 'DESC')->get();

        $result = $ToCollectModel->status($row->price, $row->status);

        return view('tocollect.show', compact('row', 'notes', 'stories', 'action', 'result'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ToCollect $task
     * @return \Illuminate\Http\Response
     */
    public function edit(ToCollect $row)
    {

        return view('tocollect.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ToCollectUpdateRequest  $request
     * @param  \App\ToCollect $task
     * @return \Illuminate\Http\Response
     */
    public function update(ToCollectUpdateRequest $request, ToCollect $row)
    {
        $title = $request->input('title');
        $description = $request->input('description');
        $price = $request->input('price');


        $row->update([
            'title' => $title,
            'description' => $description,
            'price' => $price
        ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $image->move($this->destinationPath,$image->getClientOriginalName());

            $row->update([
                'image' => $image->getClientOriginalName()
            ]);
        }



        return redirect()->route('tocollect.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ToCollect $row
     * @return \Illuminate\Http\Response
     */
    public function destroy(ToCollect $row)
    {
        $row->delete();

        return redirect()->route('tocollect.index');
    }
}
