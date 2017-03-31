@extends('layouts.app')

@section('content')

    <div class="container">
        {!! Form::open(['route' => 'todo.store']) !!}

        @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
        @endif

        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            {!! link_to(URL::previous(), 'Back', ['class' => 'btn btn-default']) !!}
        </div>

        {!! Form::close() !!}
    </div>

@endsection