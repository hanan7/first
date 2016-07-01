<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function trader(){
        return $this->belongsTo('App\Trader');
    }
}
