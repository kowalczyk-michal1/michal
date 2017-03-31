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

            @foreach ($notes as $note)
                <tr>
                    <th scope="row">{{ $note->id }}</th>
                    <td>{{ $note->title }}</td>
                    <td><a href="{{ route('notes.edit', $note->id) }}" class="btn btn-info">Edit</a></td>
                    <td>
                        {{ Form::open(['route' => ['notes.delete', $note->id], 'method' => 'delete']) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

@endsection