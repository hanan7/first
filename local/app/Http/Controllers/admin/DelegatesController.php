<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\DelegateRequest;
use App\Http\Controllers\Controller;

use App\Delegate;
use Auth;
class DelegatesController extends Controller
{
    public function getAllDelegates(){
    	$delegates = Delegate::where('delegate_type','0')->get();
    	return view ('admin.pages.delegates.alldelegates' , compact('delegates'));
    }
    
    public function getPoints(){
        $delegates = Delegate::where('admin_id',Auth::guard('admins')->user()->id)->get();
        return view ('admin.pages.delegates.points' , compact('delegates'));
    }

    public function getCustody(){
        $delegates = Delegate::where('admin_id',Auth::guard('admins')->user()->id)->get();
        return view ('admin.pages.delegates.custody' , compact('delegates'));
    }

    public function postAdd(DelegateRequest $request){


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
    	//$delegate->points=$request->input('points');
        $delegate->salary=$request->input('salary');
    	$delegate->type=$request->input('type');
        $delegate->admin_id=Auth::guard('admins')->user()->id;
        $delegate->plus_point=$request->input('plus_point');
        $delegate->main_point=$request->input('main_point');
        $delegate->delegate_type=0;
        
        
        $delegate->save();

        session()->push('success','تمت الاضافة بنجاح');
    	return redirect('delegates/all-delegates');

    }
    
     public function getEdit($id){
     	$old = Delegate::find($id);
     	return view ('admin.pages.delegates.editdelegate' , compact('old'));

    }
    public function postEdit(DelegateRequest $request , $id){
    
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
       // $delegate->points=$request->input('points');
        $delegate->salary=$request->input('salary');
        $delegate->type=$request->input('type');
        $delegate->plus_point=$request->input('plus_point');
        $delegate->main_point=$request->input('main_point');

        $delegate->save();


        session()->push('success','تم التعديل بنجاح');
    	return redirect('delegates/all-delegates');

    }
 
    public function getDelete($id){
    	$delete = Delegate::find($id);
    	$delete->delete();
    	return redirect('delegates/all-delegates'); 
    }
}
