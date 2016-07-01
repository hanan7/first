<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Store;
class StoresController extends Controller
{
    public function getAllStores(){
    	$stores = Store::get();
    	return view ('admin.pages.stores.allstores' , compact('stores'));
    }

    public function postAdd(Request $request){
    	$store = new Store();
    	$store->name=$request->input('name');
        $store->number=$request->input('number');
        $store->address=$request->input('address');
    	$store->phone=$request->input('phone');
    	$store->storekeeper=$request->input('storekeeper');
        $store->invoice_no=$request->input('invoice_no');
        $store->laborers=$request->input('laborers');
        $store->workers_no=$request->input('workers_no');
        $store->content_type=$request->input('content_type');
        $store->goods=$request->input('goods');
        $store->save();

        session()->flash('success','تمت الاضافة بنجاح');
    	return redirect('stores/all-stores');

    }
    
     public function getEdit($id){
     	$old = Store::find($id);
     	return view ('admin.pages.stores.editstore' , compact('old'));

    }
    public function postEdit(Request $request , $id){
    	$store =Store::find($id);
    	$store->name=$request->input('name');
        $store->number=$request->input('number');
        $store->address=$request->input('address');
        $store->phone=$request->input('phone');
        $store->storekeeper=$request->input('storekeeper');
        $store->invoice_no=$request->input('invoice_no');
        $store->laborers=$request->input('laborers');
        $store->workers_no=$request->input('workers_no');
        $store->content_type=$request->input('content_type');
        $store->goods=$request->input('goods');
        $store->save();
   
        session()->flash('success','تمت الاضافة بنجاح');
    	return redirect('stores/all-stores');

    }

    public function getDelete($id){
    	$delete = Store::find($id);
    	$delete->delete();
    	return redirect('stores/all-stores'); 
    }
}
