<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\DelegateRequest;
use App\Http\Controllers\Controller;

use App\sub_delegator;
use Auth;

class SubDelegatesController extends Controller
{
 
    public function getAllDelegates(){
    	$delegates =sub_delegator::where('delegate_type','1')->get();
    	return view ('admin.pages.subdelegates.alldelegates' , compact('delegates'));
    }
    
    public function getPoints(){
        $delegates = sub_delegator::where('admin_id',Auth::guard('admins')->user()->id)->get();
        return view ('admin.pages.subdelegates.points' , compact('delegates'));
    }

    public function getCustody(){
        $delegates = sub_delegator::where('admin_id',Auth::guard('admins')->user()->id)->get();
        return view ('admin.pages.subdelegates.custody' , compact('delegates'));
    }

    public function postAdd(DelegateRequest $request){


    	$delegate = new sub_delegator();
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
         $delegate->main_point=$request->input('main_point');
         $delegate->delegate_type=1;
        $delegate->save();

        session()->push('success','تمت الاضافة بنجاح');
    	return redirect('subDelegates/all-delegates');

    }
    
     public function getEdit($id){
     	$old = sub_delegator::find($id);
     	return view ('admin.pages.subdelegates.editdelegate' , compact('old'));

    }
    public function postEdit(DelegateRequest $request , $id){
    
	    $delegate =sub_delegator::find($id);
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
          $delegate->main_point=$request->input('main_point');

        $delegate->save();


        session()->push('success','تم التعديل بنجاح');
    	return redirect('subDelegates/all-delegates');

    }
 
    public function getDelete($id){
    	$delete = sub_delegator::find($id);
    	$delete->delete();
    	return redirect('subDelegates/all-delegates'); 
    }
}