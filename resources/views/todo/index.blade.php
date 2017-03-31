@extends('layouts.app')

@section('content')

<div class="container">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th class="action">Edit</th>
            <th class="action">Delete</th>
        </tr>
        </thead>
        <tbody>

            @foreach ($todo as $task)
            <tr>
                <th scope="row">{{ $task->id }}</th>
                <td>{{ $task->title }}</td>
                <td><a href="{{ route('todo.edit', $task->id) }}" class="btn btn-info">Edit</a></td>
                <td>
                    {{ Form::open(['route' => ['todo.delete', $task->id], 'method' => 'delete']) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                    {{ Form::close() }}
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>

@endsection