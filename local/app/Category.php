<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   
    public function subCategories(){
       return $this->hasMany('App\SubCategory','cat_id');
    } 
    
    public function goods(){
       return $this->hasMany('App\Good','cat_id');
    }
   
}
