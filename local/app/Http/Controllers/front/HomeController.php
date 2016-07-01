<?php
namespace App\Http\Controllers\front;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

use App\Good;

class HomeController extends Controller
{
  
    public function getIndex(){
      $products = Good::get()->take(9);
      return view('front.home' , compact('products'));
    }
   
 

}
