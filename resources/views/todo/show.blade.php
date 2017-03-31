@extends('layouts.app')

@section('content')
    @foreach ($todo as $row)
        <div class="container">
            <div class="task<?=($row->completed == 1) ? ' completed' : '';?>" id="<?=$row->id;?>">
                <div class="task_title">
                    <?=$row->title;?>
                    <?=($row->completed == 0) ? '<a href="'.route('todo.completed', $row->id).'" class="task_check"><span class="glyphicon glyphicon-ok"></span></a>' : '<div class="task_date">'.$row->completed_date.'</div>';?>
                </div>
                <div class="task_description"><?=nl2br(htmlspecialchars($row->description));?></div>
            </div>
        </div>
    @endforeach
@endsection