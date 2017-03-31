<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotesRequest;
use Illuminate\Http\Request;
use App\Notes;

class NotesController extends Controller
{
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
        $notes = Notes::orderBy('id', 'desc')->get();

        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  NotesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NotesRequest $request)
    {
        $title = $request->input('title');
        $description = $request->input('description');

        Notes::create([
            'title' => $title,
            'description' => $description
        ]);

        return redirect()->route('notes.index');

    }

    /**
     * Show all tasks and manage
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $notes = Notes::orderBy('id', 'desc')->get();

        return view('notes.show', compact('notes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notes $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Notes $note)
    {

        return view('notes.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  NotesRequest  $request
     * @param  \App\Notes $note
     * @return \Illuminate\Http\Response
     */
    public function update(NotesRequest $request, Notes $note)
    {
        $title = $request->input('title');
        $description = $request->input('description');

        $note->update([
            'title' => $title,
            'description' => $description
        ]);

        return redirect()->route('notes.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notes $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notes $note)
    {
        $note->delete();

        return redirect()->route('notes.index');
    }
}
