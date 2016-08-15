<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Role extends Authenticatable
{
   
	public function role_user(){
		return $this->hasMany("App\RoleAdmin","role_id");
	}   
}
