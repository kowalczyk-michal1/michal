<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToCollect extends Model
{
    protected $table = "to_collect";

    protected $fillable = ['title', 'description', 'price', 'image', 'status'];


    public function status($price, $status) {
        $result = $price - $status;

        return $result;
    }

    public function action($status, $type, $amount) {
        if ($type == 1) {
            $result = $status + $amount;
        } elseif ($type == 2) {
            $result = $status - $amount;
        }

        return $result;
    }
}
