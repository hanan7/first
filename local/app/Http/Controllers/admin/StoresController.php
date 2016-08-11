<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\DelegateRequest;
use App\Good;
use App\Store;
use App\StoreType;
use App\Inventory;


class StoresController extends Controller
{
    public function getAllStores(){
        $goods =  Good::get();
        $stores = Store::get();
        $storesType = StoreType::orderBy("id","asc")->get();
        return view ('admin.pages.stores.allstores' , compact('stores' , 'goods','storesType'));
    }

    public function postAdd(DelegateRequest $request){
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
        $store->store_type=$request->input('store_type');
        $store->range=$request->input('range');
        
       // var_dump($store);
      
        $store->save();

        session()->push('success','تمت الاضافة بنجاح');
        return redirect('stores/all-stores');

    }
    
     public function getEdit($id){
        $old = Store::find($id);
        $storesType = StoreType::orderBy("id","asc")->get();
        return view ('admin.pages.stores.editstore' , compact('old','storesType'));

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
        $store->store_type=$request->input('store_type');
        $store->range=$request->input('range');
        

        $store->save();
   
        session()->push('success','تم التعديل بنجاح');
        return redirect('stores/all-stores');

    }

      public function postInventory(Request $request){

     // echo "<pre>"; var_dump($request->all());die();

        //update quantity in goods table
        foreach ($request->input('quantity') as $key => $value)     
        {     
              $good =Good::find($key);
              $good->quantity=$value;
              $good->save();   
         }
         
         //add new Inventory
         $inventory = new Inventory();
         $inventory->goods=json_encode($request->input('oldQuantity'));
         $inventory->store_id=$request->input('store_id');
         $inventory->save();   

       
   
        session()->push('success','تم اضافة الجرد');
        return redirect('stores/all-stores');

    }

    public function getDelete($id){
        $delete = Store::find($id);
        $delete->delete();
        return redirect('stores/all-stores'); 
    }

    public function getInventory($id){
       $storeGoods = Good::where("store_id",$id)->get();
       $store_id=$id;
        return view ('admin.pages.stores.inventory' , compact('storeGoods','store_id'));
    }

    public function getAllInventory($id){

        // dd("ddd");
        $Inventories = Inventory::where("store_id",$id)->get();
        return view ('admin.pages.stores.allinventory' , compact('Inventories'));
    }
    

    public function getGoods($id){
       $storeGoods = Good::where("store_id",$id)->get();
        return view ('admin.pages.stores.storeGoods' , compact('storeGoods'));

    }
    
}
