<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delegate extends Model
{
    

       protected $table="delegates";

       protected $fillable = [
        'name', 'address', 'phone','traffic','carnumber',
        'sortwork','money','properties','salary','type','main_point','plus_point'
    ];


}
