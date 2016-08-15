<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sub_delegator extends Model
{
    
     protected $table="delegates";

      protected $fillable = [
        'name', 'address', 'phone','traffic','carnumber',
        'sortwork','money','properties','salary','type','main_point'
    ];

    

     protected $hidden = [
        'plus_point'
    ];

}
