<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales_operations extends Model
{
    //
   protected $table="sales_operations"; 

   protected $fillable =['product_id','store_id','quantity','saler_id','buyer_id'];
}
