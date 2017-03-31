<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
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
        $todo = Todo::orderBy('id', 'desc')->get();

        return view('todo.index', compact('todo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TodoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoRequest $request)
    {
        $title = $request->input('title');
        $description = $request->input('description');

        Todo::create([
            'title' => $title,
            'description' => $description,
            'completed' => 0
        ]);

        return redirect()->route('todo.index');

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
     * @param  \App\Todo $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $task)
    {

        return view('todo.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TodoRequest  $request
     * @param  \App\Todo $task
     * @return \Illuminate\Http\Response
     */
    public function update(TodoRequest $request, Todo $task)
    {
        $title = $request->input('title');
        $description = $request->input('description');

        $task->update([
            'title' => $title,
            'description' => $description,
            'completed' => 0
        ]);

        return redirect()->route('todo.index');

    }

    /**
     * Mark task as completed
     *
     * @param  \App\Todo $task
     * @return \Illuminate\Http\Response
     */
    public function completed(Todo $task)
    {
        $task->update([
            'completed' => 1,
            'completed_date' => date("Y-m-d H:i:s")
        ]);

        return redirect()->route('todo.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $task)
    {
        $task->delete();

        return redirect()->route('todo.index');
    }
}
