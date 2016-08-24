<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\addInventoryRequest;
use App\Http\Controllers\Controller;
use App\Store;
use App\Good;
use App\NewInventorey;
use App\Newinventory_products;



class NewInventoreyController extends Controller
{
    public function index(){

    	$inventories=NewInventorey::orderBy('id', 'desc')->get();
    	return view ('admin.pages.inventory.all',compact('inventories'));
    }

    public function add(){
      $stores=Store::all();
      return view ('admin.pages.inventory.add',compact('stores'));
    }

    public function edit($id){
      $stores=Store::all();
      $inventory=NewInventorey::find($id);
      //get all store id 
      $allProducts=Newinventory_products::where('inventory_id',$id)
                                        ->groupBy('store_id')
                                        ->get();
      //no products related to this inventory 
      if(empty($allProducts)){

      }
      $groupedProducts=array();
      foreach ($allProducts as $key => $value) {
       $groupedProducts[$key]['store_name']=Store::find($value->store_id)->name;
       $groupedProducts[$key]['productes']=Newinventory_products::where('newinventory_products.store_id',$value->store_id)
                                                                ->where('newinventory_products.inventory_id',$id)
                                                                ->join('goods','goods.id','=','newinventory_products.product_id')
                                                                ->get();
        
      }
    
     
      
      return view ('admin.pages.inventory.edit',compact('stores','inventory','groupedProducts'));
    }

    
     public function loadProducts(Request $Request){

        $data=array();
     	$ids= $Request->except('_token')['stores_id'];

        foreach ($ids as $key => $value)
        {
            $pro=Good::where('store_id',$value)->get();
            $store=Store::find($value);
            //return $store;
            if(count($pro)>0)
            {
              $data['goods'][$store['name']]=$pro;
             // $data['goods']['store_name']=$store['name'];

            }  
        }
        
        $data['response']=!empty($data)?1:0;
        
        return $data;

    	
    }
    public function addInventory(Request $Request){
    
      // return $Request->all();
      //add new inventory in newinvetory table
      $NewInventorey= new NewInventorey();
      $NewInventorey->from= \Carbon\Carbon::parse($Request->from);
      $NewInventorey->to= \Carbon\Carbon::parse($Request->to);
      $NewInventorey->stores_id = json_encode($Request->stores);
      $NewInventorey->save();

      //add  inventory productes in Newinventory_products table
      for ($i=0; $i < count($Request->newQuantity); $i++) { 
        $Newinventory_products=new Newinventory_products();
        $Newinventory_products->inventory_id=$NewInventorey->id;
        $Newinventory_products->product_id=$Request->id[$i];
        $Newinventory_products->oldQuentity=$Request->oldQuantity[$i];
        $Newinventory_products->newQuentity=$Request->newQuantity[$i];
        $Newinventory_products->store_id=$Request->stores_id[$i];
        $ckeck=$Newinventory_products->save();
      }
        if($ckeck)
        {
        session()->push('success', 'تم اضافه  الجرد بنجاح');
        }else{
          session()->push('error', 'حدث خطأ اثناء الاضافه'); 
        }
        return redirect('admin/inventory');
        
    }

    public function editInventory(Request $Request,$id){
    
      //add new inventory in newinvetory table
      $NewInventorey= NewInventorey::find($id);
      $NewInventorey->from= \Carbon\Carbon::parse($Request->from);
      $NewInventorey->to= \Carbon\Carbon::parse($Request->to);
      $NewInventorey->stores_id = json_encode($Request->stores);
      $NewInventorey->save();

      //delete all products related to this inventory from Newinventory_products
      Newinventory_products::where('inventory_id',$id)->delete();
      //return $xx;

      //add  inventory productes in Newinventory_products table
      for ($i=0; $i < count($Request->newQuantity); $i++) { 

        $Newinventory_products=new Newinventory_products();
        $Newinventory_products->inventory_id=$NewInventorey->id;
        $Newinventory_products->product_id=$Request->id[$i];
        $Newinventory_products->oldQuentity=$Request->oldQuantity[$i];
        $Newinventory_products->newQuentity=$Request->newQuantity[$i];
        $Newinventory_products->store_id=$Request->stores_id[$i];
        $ckeck=$Newinventory_products->save();
      }

        if($ckeck)
        {
           session()->push('success', 'تم تعديل  الجرد بنجاح');
        }else
        {
           session()->push('error', 'حدث خطأ اثناء التعديل'); 
        }

       return redirect('admin/inventory');
         
        
    }
  public function delete($id){
      $delete = NewInventorey::find($id);
      $ckeck=$delete->delete();
       if($ckeck)
        {
        session()->push('success',' تم الحذف بنجاح');
        }else
        {
          session()->push('error', 'حدث خطأ اثناء الحذف  '); 
        }
      return redirect('admin/inventory');
  }
    



    
}
