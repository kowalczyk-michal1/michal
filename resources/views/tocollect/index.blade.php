@extends('layouts.app')

@section('content')

    <div class="container">

            @foreach ($tocollect as $row)
                <div class="container">
                    <div class="note" id="<?=$row->id;?>">
                        <div class="note_title">
                            <?=$row->title;?>
                            <?='<div class="note_date">'.$row->created_at.'</div>';?>
                        </div>
                        <div class="note_description">
                            <div><img src="/uploads/<?=$row->image;?>" width="200" /></div>
                            <div>
                                <a href="{{ route('tocollect.edit', $row->id) }}" class="btn btn-info">Edit</a>

                                {{ Form::open(['route' => ['tocollect.delete', $row->id], 'method' => 'delete']) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                {{ Form::close() }}
                            </div>
                            <?=nl2br(htmlspecialchars($row->description));?>
                        </div>
                    </div>
                </div>
            @endforeach

    </div>

@endsection