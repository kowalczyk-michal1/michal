<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToCollectAction extends Model
{
    protected $table = "to_collect_history";

    protected $fillable = ['to_collect_id', 'type', 'description', 'price'];
}
