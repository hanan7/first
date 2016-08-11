<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{

    protected $fillable = [
        'price'
    ];
    
    public function good() {
        return $this->belongsTo('App\Good', 'product_id');
    }
}
