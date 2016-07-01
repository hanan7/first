<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Delegate;
use App\Trader;
class TradersController extends Controller
{
    public function getAllTraders(){ 
    	$traders = Trader::get();
        $delegate = Delegate::get();
    	return view ('admin.pages.traders.alltraders' , compact('traders' , 'delegate'));
    }
  
    public function getShowTrader($id){
      $tr = Trader::find($id);
        return view ('admin.pages.traders.alltraders' , compact('tr'));
    }

    public function postAdd(Request $request){
    	$trader = new Trader();
    	$trader->code=$request->input('code');
    	$trader->name=$request->input('name');
    	$trader->address=$request->input('address');
    	$trader->phone=$request->input('phone');
        $trader->sender=$request->input('sender');
    	$trader->deal_type=$request->input('deal_type');
        $trader->numberpoint=$request->input('numberpoint');
        $trader->trader_type=$request->input('trader_type');
        $trader->goods=$request->input('goods');
        $trader->save();

        session()->flash('success','تمت الاضافة بنجاح');
    	return redirect('traders/all-traders');

    }
    
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
        $trader->numberpoint=$request->input('numberpoint');
        $trader->trader_type=$request->input('trader_type');
        $trader->goods=$request->input('goods');
        $trader->save();

        session()->flash('success','تمت الاضافة بنجاح');
    	return redirect('traders/all-traders');

    }

    public function getDelete($id){
    	$delete = Trader::find($id);
    	$delete->delete();
    	return redirect('traders/all-traders'); 
    }
}
