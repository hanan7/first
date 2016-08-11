<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\DelegateRequest;
use Session;
use App\Supplier;
use App\Store;
class SuppliersController extends Controller
{
    public function getAllSuppliers(){
        $stores = Store::get();
    	$suppliers = Supplier::get();
    	return view ('admin.pages.suppliers.allsuppliers' , compact('suppliers' , 'stores'));
    }

    public function postAdd(DelegateRequest $request){


    	$supplier = new Supplier();
    	$supplier->code=$request->input('code');
    	$supplier->name=$request->input('name');
        $supplier->address=$request->input('address');
        $supplier->phone=$request->input('phone');
        $supplier->type=$request->input('type');
        $supplier->varieties=$request->input('varieties');
        $supplier->debt=$request->input('debt');
        $supplier->recipient_stores=$request->input('recipient_stores');
        

        $supplier->save();

        session()->push('success','تمت الاضافة بنجاح');
    	return redirect('suppliers/all-suppliers');

    }
    
     public function getEdit($id){
     	$old = Supplier::find($id);
        $stores = Store::get();
     	return view ('admin.pages.suppliers.editsupplier' , compact('old' , 'stores'));

    }
    public function postEdit(Request $request , $id){
    
	    $supplier =Supplier::find($id);
    	$supplier->code=$request->input('code');
    	$supplier->name=$request->input('name');
        $supplier->address=$request->input('address');
        $supplier->phone=$request->input('phone');
        $supplier->type=$request->input('type');
        $supplier->varieties=$request->input('varieties');
        $supplier->debt=$request->input('debt');
        $supplier->recipient_stores=$request->input('recipient_stores');
        

        $supplier->save();

        session()->push('success','تم التعديل بنجاح');
    	return redirect('suppliers/all-suppliers');

    }

    public function getDelete($id){
    	$delete = Supplier::find($id);
    	$delete->delete();
    	return redirect('suppliers/all-suppliers'); 
    }
}
