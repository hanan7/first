<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'name',
        'type',
        'store',
        'number',
        'note_book',
        'payment_method',
        'sub_total',
        'date',
        'extra_money',
        'discount',
        'paid_amount',
        'paid_rest',
        'notes',
    ];

    public $timestamps= false;

    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
    
    public function products(){
        return $this->belongsToMany('App\Good','invoice_product','invoice_id','product_id')->withPivot(
            'price',
            'total',
            'quantity',
            'code',
            'unit'
        );
    }
}
