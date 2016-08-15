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
        'extra_money',
        'discount',
        'paid_amount',
        'paid_rest',
        'notes',
    ];

    public $timestamps= false;

    public function order(){
        return $this->belongsTo('App\Order','order_id');
    }
}
