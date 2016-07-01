<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Supplier;
class SuppliersController extends Controller
{
    public function getAllSuppliers(){
    	$suppliers = Supplier::get();
    	return view ('admin.pages.suppliers.allsuppliers' , compact('suppliers'));
    }

    public function postAdd(Request $request){


    	$supplier = new Supplier();
    	$supplier->code=$request->input('code');
    	$supplier->name=$request->input('name');
        $supplier->address=$request->input('address');
        $supplier->phone=$request->input('phone');
        $supplier->type=$request->input('type');
        $supplier->varieties=$request->input('varieties');
        $supplier->recipient_stores=$request->input('recipient_stores');
        

        $supplier->save();

        session()->flash('success','تمت الاضافة بنجاح');
    	return redirect('suppliers/all-suppliers');

    }
    
     public function getEdit($id){
     	$old = Supplier::find($id);
     	return view ('admin.pages.suppliers.editsupplier' , compact('old'));

    }
    public function postEdit(Request $request , $id){
    
	    $supplier =Supplier::find($id);
    	$supplier->code=$request->input('code');
    	$supplier->name=$request->input('name');
        $supplier->address=$request->input('address');
        $supplier->phone=$request->input('phone');
        $supplier->type=$request->input('type');
        $supplier->varieties=$request->input('varieties');
        $supplier->recipient_stores=$request->input('recipient_stores');
        

        $supplier->save();

        session()->flash('success','تم التعديل بنجاح');
    	return redirect('suppliers/all-suppliers');

    }

    public function getDelete($id){
    	$delete = Supplier::find($id);
    	$delete->delete();
    	return redirect('suppliers/all-suppliers'); 
    }
}
