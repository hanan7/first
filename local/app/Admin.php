<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $fillable=[
        'fullname','username','email','password','image','remember_token'
    ];
       protected $hidden = [
        'password', 'remember_token',
    ];

    public function exist1($role_id){
		return $this->hasMany('App\RoleAdmin','admin_id')->where("admin_id",$role_id)->first();
	} 
	public function roles1(){
		return $this->hasMany('App\RoleAdmin','admin_id');
	}
   
}
