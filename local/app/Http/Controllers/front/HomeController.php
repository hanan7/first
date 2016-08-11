<?php
namespace App\Http\Controllers\front;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

use App\Good;
use App\Vmsg;
class HomeController extends Controller
{
  
    public function getIndex(){
      $products = Good::get()->take(9);
      return view('front.home' , compact('products'));
    }

    public function getProducts(){
      $products = Good::get();
      return view('front.products' , compact('products'));
    }
    
  
   
    public function postMsgs(Request $request){
    	$msg = new Vmsg();
    	$msg->name = $request->input('name');
    	$msg->email = $request->input('email');
      $msg->phone = $request->input('phone');
		  $msg->content = $request->input('content');
		  $msg->save();
		return redirect()->back()->withInfo('');


    }
 

}
