<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Trader;
use App\Order;
use App\Plumber;
use App\Delegate;
use Session;
class OrdersController extends Controller
{

   public function getAlldelegates(){
    	$delegates = Delegate::get();
    	return view ('admin.pages.orders.check' , compact('delegates'));
    }


   public function getAllplumbers(){
    	$plumbers = Plumber::get();
    	return view ('admin.pages.orders.check' , compact('plumbers'));
    }


   public function getAllgoods(){

       
    	$goods = Goods::get();
    	return view ('admin.pages.orders.check' , compact('goods'));
    }

    public function getAllOrders(){
        $plumbers = Plumber::get();
        $delegates = Delegate::get();
        $orders = Order::get();
    	return view ('admin.pages.orders.allorders' , compact('orders' ,'delegates' , 'plumbers'));
    }

    public function postAdd(Request $request){
       
     	$order = new Order(); 
        $order->trader_name=$request->input('trader_name');
        $order->phone=$request->input('phone');
        $order->address=$request->input('address');
        $order->goods=$request->input('goods');
        $order->qty=$request->input('qty');
	    $order->check_date=$request->input('check_date');

        $order->save();

        session()->flash('success','تمت الاضافة بنجاح');
    	return redirect()->back();
    }
    
     public function getEdit($id){
        $plumbers = Plumber::get();
        $delegates = Delegate::get();
     	$old = Order::find($id);
     	return view ('admin.pages.orders.editorder' , compact('old' , 'delegates' , 'plumbers'));

    }
    public function postEdit(Request $request , $id){
    
	    $order =Order::find($id);
        $order->trader_name=$request->input('trader_name');
        $order->phone=$request->input('phone');
        $order->address=$request->input('address');
        $order->goods=$request->input('goods');
        $order->qty=$request->input('qty');
        $order->delegate_sender=$request->input('delegate_sender');
        $order->plumber_sender=$request->input('plumber_sender');
	    $order->check_date=$request->input('check_date');

        $order->save();


        Session::flash('success','تم تأكيد الطلبية بنجاح');
    	return redirect('orders/all-orders');

    }

    public function getDelete($id){
    	$delete = Order::find($id);
    	$delete->delete();
    	return redirect('orders/all-orderfs'); 
    }
}
