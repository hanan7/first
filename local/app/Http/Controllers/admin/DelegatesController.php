<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Delegate;
class DelegatesController extends Controller
{
    public function getAllDelegates(){
    	$delegates = Delegate::get();
    	return view ('admin.pages.delegates.alldelegates' , compact('delegates'));
    }

    public function postAdd(Request $request){


    	$delegate = new Delegate();
    	$delegate->code=$request->input('code');
    	$delegate->name=$request->input('name');
        $delegate->address=$request->input('address');
        $delegate->phone=$request->input('phone');
        $delegate->traffic=$request->input('traffic');
        $delegate->carnumber=$request->input('carnumber');
        $delegate->sortwork=$request->input('sortwork');
        $delegate->money=$request->input('money');
        $delegate->properties=$request->input('properties');
    	$delegate->numberpoint=$request->input('numberpoint');
        $delegate->salary=$request->input('salary');
    	$delegate->type=$request->input('type');

        $delegate->save();

        session()->flash('success','تمت الاضافة بنجاح');
    	return redirect('delegates/all-delegates');

    }
    
     public function getEdit($id){
     	$old = Delegate::find($id);
     	return view ('admin.pages.delegates.editdelegate' , compact('old'));

    }
    public function postEdit(Request $request , $id){
    
	    $delegate =Delegate::find($id);
    	$delegate->code=$request->input('code');
        $delegate->name=$request->input('name');
        $delegate->address=$request->input('address');
        $delegate->phone=$request->input('phone');
        $delegate->traffic=$request->input('traffic');
        $delegate->carnumber=$request->input('carnumber');
        $delegate->sortwork=$request->input('sortwork');
        $delegate->money=$request->input('money');
        $delegate->properties=$request->input('properties');
        $delegate->numberpoint=$request->input('numberpoint');
        $delegate->salary=$request->input('salary');
        $delegate->type=$request->input('type');

        $delegate->save();


        session()->flash('success','تمت الاضافة بنجاح');
    	return redirect('delegates/all-delegates');

    }

    public function getDelete($id){
    	$delete = Delegate::find($id);
    	$delete->delete();
    	return redirect('delegates/all-delegates'); 
    }
}
