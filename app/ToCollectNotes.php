<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToCollectNotes extends Model
{
    protected $table = "to_collect_notes";

    protected $fillable = ['to_collect_id', 'description'];
}
