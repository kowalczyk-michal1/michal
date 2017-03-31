@extends('layouts.app')

@section('content')
    @foreach ($notes as $row)
        <div class="container">
            <div class="note" id="<?=$row->id;?>">
                <div class="note_title">
                    <?=$row->title;?>
                    <?='<div class="note_date">'.$row->created_at.'</div>';?>
                </div>
                <div class="note_description"><?=nl2br(htmlspecialchars($row->description));?></div>
            </div>
        </div>
    @endforeach
@endsection