<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToCollect extends Model
{
    protected $table = "to_collect";

    protected $fillable = ['title', 'description', 'price', 'image', 'status'];
}
