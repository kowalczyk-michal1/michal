@extends('layouts.app')

@section('content')

    <div class="container">

            <div class="note" id="<?=$row->id;?>">
                <div class="note_title">
                    <?=$row->title;?>
                    <?='<div class="note_date">'.$row->created_at.'</div>';?>
                </div>
                <div class="note_description" style="display:block;">
                    <div><img src="/uploads/<?=$row->image;?>" width="200" /></div>
                    <div>LEFT: <b>{{  $result }}</b></div>
                    <div>

                        <a href="{{ route('tocollect.edit', $row->id) }}" class="btn btn-info">Edit</a>
                        {{ Form::open(['route' => ['tocollect.delete', $row->id], 'method' => 'delete']) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                        {{ Form::close() }}
                    </div>

                    <?=nl2br(htmlspecialchars($row->description));?>
                </div>
            </div>

            <div>
                <a href="{{ route('tocollect.storenote', ['row' => $row->id, 'action' => 'addnote']) }}" class="btn btn-info">ADD NOTE</a>
                <a href="{{ route('tocollect.storenote', ['row' => $row->id, 'action' => 'addaction']) }}" class="btn btn-info">ADD ACTION</a>
            </div>

            @if ($action == "addnote")
                <div>
                    {!! Form::open(['route' => ['tocollect.storenote', $row->id, 'action' => 'addnote']]) !!}

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif


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
            @endif

            @if ($action == "addaction")
                <div>
                    {!! Form::open(['route' => ['tocollect.storeaction', $row->id, 'action' => 'addaction']]) !!}

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
                        {!! Form::label('type', 'Type:') !!}
                        {!! Form::select('type', ['1' => 'Deposit', '2' => 'Withdraw'], ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('price', 'Amount:') !!}
                        {!! Form::number('price', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                        {!! link_to(URL::previous(), 'Back', ['class' => 'btn btn-default']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            @endif

            @foreach ($notes as $note)
                    <div class="note" id="<?=$note->id;?>">
                        <div class="note_tite"><b><?=$note->created_at;?></b></div>
                        <?=nl2br(htmlspecialchars($note->description));?>
                    </div>
            @endforeach


            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Amount</th>
                    <th>Title</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($stories as $story)
                    <tr>
                        <th scope="row">{{ $story->id }}</th>
                        <td>
                            @if ($story->type == 1)
                                <span style="color:darkgreen;font-weight:bold;">+{{ $story->price }} £</span>
                            @endif

                            @if ($story->type == 2)
                                <span style="color:darkred;font-weight:bold;">-{{ $story->price }} £</span>
                            @endif
                        </td>
                        <td>{{ $story->description }}</td>
                        <td>{{ $story->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>

@endsection