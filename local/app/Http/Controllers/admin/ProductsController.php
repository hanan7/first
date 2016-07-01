<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Good;
class ProductsController extends Controller
{
    public function getAllProducts(){
    	$products = Good::get();
    	return view ('admin.pages.products.allproducts' , compact('products' , 'old'));
    }
   
    public function postAdd(Request $request){
    	$product = new Good();
        $product->code=$request->input('code');
    	$product->name=$request->input('name');
        $product->desc=$request->input('desc');
        $product->quantity=$request->input('quantity');
        $product->b_price=$request->input('b_price');
        $product->s_price=$request->input('s_price');
    	$product->company=$request->input('company');
    
    	$file=$request->file('image'); 
        $destinationpath  ='uploads/products';
        $filename=$file->getClientOriginalName();
        $file ->move ($destinationpath,$filename);
        $product->image=$filename; 
   
        $product->save(); 

        session()->flash('success','تمت الاضافة بنجاح');
    	return redirect('products/all-products');

    }
    
     public function getEdit($id){
        $old = Good::find($id);
        return view ('admin.pages.products.editproduct' , compact('old'));

    }
    public function postEdit(Request $request , $id){
    	$product =Good::find($id);
    	$product->code=$request->input('code');
        $product->name=$request->input('name');
        $product->desc=$request->input('desc');
        $product->quantity=$request->input('quantity');
        $product->b_price=$request->input('b_price');
        $product->s_price=$request->input('s_price');
        $product->company=$request->input('company');
    
        $file=$request->file('image'); 
        $destinationpath  ='uploads/products';
        $filename=$file->getClientOriginalName();
        $file ->move ($destinationpath,$filename);
        $product->image=$filename; 
   
        $product->save();
        session()->flash('success','تم التعديل بنجاح');
    	return redirect('products/all-products');

    }

    public function getDelete($id){
    	$delete = Good::find($id);
    	$delete->delete();
    	return redirect('products/all-products'); 
    }
}
