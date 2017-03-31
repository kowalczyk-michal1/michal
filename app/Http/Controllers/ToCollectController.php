<?php

namespace App\Http\Controllers;

use App\Http\Requests\ToCollectRequest;
use App\Http\Requests\ToCollectUpdateRequest;
use Illuminate\Http\Request;
use App\ToCollect;

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

    /**
     * Show all tasks and manage
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $todo = Todo::orderBy('id', 'desc')->get();

        return view('todo.show', compact('todo'));
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
