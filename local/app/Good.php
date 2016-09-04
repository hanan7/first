<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{


    public function prices()
    {
        return $this->hasMany('App\Price', 'product_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'cat_id');
    }

    public function invoice()
    {
        return $this->belongsToMany('App\Invoice', 'invoice_product', 'product_id', 'invoice_id')->withPivot(
            'price',
            'total',
            'quantity',
            'code',
            'unit'
        );

    }

    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
    
    public function _store(){
        return $this->belongsTo('App\Store','store_id');
    }

    public function subCategory()
    {
        return $this->belongsTo('App\SubCategory', 'sub_cat_id');
    }
}
