@extends('layouts.app')

@section('content')

    <div class="container">

            @foreach ($tocollect as $row)
                    <div class="note" id="<?=$row->id;?>">
                        <div class="note_title">
                            <?=$row->title;?>
                            <?='<div class="note_date">'.$row->created_at.'</div>';?>
                        </div>
                        <div class="note_description">
                            <div><img src="/uploads/<?=$row->image;?>" width="200" /></div>
                            <div>
                                <a href="{{ route('tocollect.show', $row->id) }}" class="btn btn-warning">Show</a>
                            </div>

                            <?=nl2br(htmlspecialchars($row->description));?>
                        </div>
                    </div>
            @endforeach

    </div>

@endsection