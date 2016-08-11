<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Msg extends Model
{
    
    public function admin(){
        return $this->belongsTo('App\Admin'  ,"admin_id");
    }
}
