<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{

    protected $fillable = [
      'name'  
    ];
    
    public function category() {
        return $this->belongsTo('App\Category', 'cat_id');
    }
    
    public function goods(){
       return $this->hasMany('App\Good','sub_cat_id');
    }
}
