<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $fillable=[
        'name','username','email','password','flag', 'phone','address' , 'photo' , 'other', 'remember_token'
    ];
       protected $hidden = [
        'password', 'remember_token',
    ];
public function msgs(){
        return $this->hasMany('App\Msg');
    }
}
