<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\DelegateRequest;
use App\Delegate;
use App\Trader;
use App\Order;
use App\Good;
use Auth;
class TradersController extends Controller
{
    public function getAllTraders(){ 
    	$traders = Trader::get();
        $delegate = Delegate::get();
        $goods = Good::get();
    	return view ('admin.pages.traders.alltraders' , compact('traders' , 'delegate', 'goods'));
    }

    public function getPoints(){
        $traders = Trader::where('admin_id',Auth::guard('admins')->user()->id)->get();
        return view ('admin.pages.traders.points' , compact('traders'));
    }

    public function getAllDebt(){ 
       
        $traders = Trader::where('admin_id',Auth::guard('admins')->user()->id)->get();
        return view ('admin.pages.traders.alldebt' , compact('traders'));
    }
  
 
    public function postAdd(DelegateRequest $request){
    	$trader = new Trader();
    	$trader->code=$request->input('code');
    	$trader->name=$request->input('name');
    	$trader->address=$request->input('address');
    	$trader->phone=$request->input('phone');
        $trader->sender=$request->input('sender');
    	$trader->deal_type=$request->input('deal_type');
        $trader->points=$request->input('points');
        $trader->trader_type=$request->input('trader_type'); 
        $trader->debt=$request->input('debt');
        $trader->admin_id=Auth::guard('admins')->user()->id;
        $trader->save();

 
        session()->push('success','تمت الاضافة بنجاح');
    	return redirect('traders/all-traders');

    }
    public function getAddOrder(){
         $goods = Good::get();
        return view ('admin.pages.traders.addorder', compact('goods'));
    }
  
/*    public function postAddOrder(Request $request){
       
        $order = new Order(); 
        $order->trader_name=$request->input('trader_name');
        $order->phone=$request->input('phone');
        $order->address=$request->input('address');
        $order->goods=$request->input('goods');
        $order->qty=$request->input('qty');
        $order->check_date=$request->input('check_date');
        $order->admin_id=Auth::guard('admins')->user()->id;
        $order->save();

        session()->push('success','تم التعديل بنجاح');
        return redirect()->back();
    } */

    public function getEdit($id){
     	$old = Trader::find($id);
        $delegate = Delegate::get();
     	return view ('admin.pages.traders.edittrader' , compact('old' , 'delegate'));

    }
    public function postEdit(Request $request , $id){
    	$trader =Trader::find($id);
    	$trader->code=$request->input('code');
        $trader->name=$request->input('name');
        $trader->address=$request->input('address');
        $trader->phone=$request->input('phone');
        $trader->sender=$request->input('sender');
        $trader->deal_type=$request->input('deal_type');
        $trader->points=$request->input('points');
        $trader->trader_type=$request->input('trader_type');
        $trader->debt=$request->input('debt');
        $trader->save();

        session()->push('success','تم التعديل بنجاح');
    	return redirect('traders/all-traders');

    }

    public function getDelete($id){
    	$delete = Trader::find($id);
    	$delete->delete();
    	return redirect('traders/all-traders'); 
    }
}
