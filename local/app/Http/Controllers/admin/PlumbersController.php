<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Plumber;
class PlumbersController extends Controller
{
    public function getAllPlumbers(){
    	$plumbers = Plumber::get();
    	return view ('admin.pages.plumbers.allplumbers' , compact('plumbers'));
    }
   
    public function postAdd(Request $request){
    	$plumber = new Plumber();
        $plumber->code=$request->input('code');
    	$plumber->name=$request->input('name');
        $plumber->phone=$request->input('phone');
        $plumber->address=$request->input('address');
        $plumber->contract_date=$request->input('contract_date');
        $plumber->contract_type=$request->input('contract_type');
        $plumber->salary=$request->input('salary');
        $plumber->numberpoint=$request->input('numberpoint');
        $plumber->save();

        Session::flash('success','تمت الاضافة بنجاح');
    	return redirect('plumbers/all-plumbers');

    }
    
     public function getEdit($id){
     	$old = Plumber::find($id);
     	return view ('admin.pages.plumbers.editplumber' , compact('old'));

    }
    public function postEdit(Request $request , $id){
    	$plumber =Plumber::find($id);
    	$plumber->code=$request->input('code');
        $plumber->name=$request->input('name');
        $plumber->phone=$request->input('phone');
        $plumber->address=$request->input('address');
        $plumber->contract_date=$request->input('contract_date');
        $plumber->contract_type=$request->input('contract_type');
        $plumber->salary=$request->input('salary');
        $plumber->numberpoint=$request->input('numberpoint');

        $plumber->save();

        session()->flash('success','تم التعديل بنجاح');
    	return redirect('plumbers/all-plumbers');

    }

    public function getDelete($id){
    	$delete = Plumber::find($id);
    	$delete->delete();
    	return redirect('plumbers/all-plumbers'); 
    }
}
