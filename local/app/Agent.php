<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    public function lemos(){
        return $this->hasMany('App\Lemo_reservation');
    }

     public function plans(){
        return $this->hasMany('App\Plan_reservation');
    }

     public function trips(){
        return $this->hasMany('App\Trip_reservation');
    }
}
