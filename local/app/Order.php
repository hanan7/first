<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function trader(){
        return $this->belongsTo('App\Trader');
    }

    public function products() {
        return $this->belongsToMany('App\Good','order_product', 'order_id', 'product_id')->withPivot(
            'price',
            'total',
            'quantity',
            'code',
            'unit'
        );
    }

    public function invoice(){
        return $this->hasOne('App\Invoice','order_id');
    }

}