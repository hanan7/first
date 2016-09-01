<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\DelegateRequest;
use App\Http\Controllers\Controller;
use App\Store;
use App\Delegate;
use Auth;
class DelegatesController extends Controller
{
    public function getAllDelegates(){
    	$delegates = Delegate::where('delegate_type','0')->get();
        $stores=Store::all();
    	return view ('admin.pages.delegates.alldelegates' , compact('delegates','stores'));
    }
    
    public function getPoints(){
        $delegates = Delegate::where('admin_id',Auth::guard('admins')->user()->id)->get();
        return view ('admin.pages.delegates.points' , compact('delegates'));
    }

    function escapeJsonString($value) 
    { 
    # list from www.json.org: (\b backspace, \f formfeed)
    $escapers = array("\\", "/", "\"", "\n", "\r", "\t", "\x08", "\x0c");
    $replacements = array("\\\\", "\\/", "\\\"", "\\n", "\\r", "\\t", "\\f", "\\b");
    $result = str_replace($escapers, $replacements, $value);
    return $result;
    }

    
    function merge($array , &$return){

        $_this = $this;
        if(is_array($array)){
            array_walk_recursive($array, function($elm) use(&$return,&$_this){
                $_this->merge($elm,$return);
            });
        }else if(is_string($array) && stripos($array, '[') !== false){
            $array = explode(',', trim($array,'[]'));
            $this->merge($array,$return);
        }else{
            $return [] = $array;
        }
    }


    public function getStore(Request $Request)
    {
        if ($Request->type=="0") 
        {
            //not subDelagate
            $delagateStores=(array)json_decode(Delegate::find($Request->id)
                                ->stores_id);
            $subDelagateStores=(array)Delegate::where('parent_id',$Request->id)
                                                    //->get(['stores_id']);
                                                    ->pluck('stores_id');
                                                    
            //return $subDelagateStores;
             $x=$this->array_merge_mixed($subDelagateStores);
             //return  $x;
          
            $stores=array_merge($delagateStores,$x);
            return $stores;
            $storesName=array();

            foreach ($stores as $key => $value) 
            {
               // return 
                $storesName[]=Store::find($value)->name;
            }

            return $storesName;
        }else
        {
            //subDelagate
            $stores=json_decode(Delegate::find($Request->id)
                                ->stores_id);
            $storesName=array();

            foreach ($stores as $key => $value) {

                $storesName[$key]=Store::find($value)->name;
            }
            return $storesName;
        }
        
        
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
        $delegate->stores_id=json_encode($request->input('stores_id'),JSON_HEX_QUOT);
        $delegate->delegate_type=0;
        
        
        $delegate->save();

        session()->push('success','تمت الاضافة بنجاح');
    	return redirect('delegates/all-delegates');

    }
    
     public function getEdit($id){
     	$old = Delegate::find($id);
        $stores=Store::all();
     	return view ('admin.pages.delegates.editdelegate' , compact('old','stores'));

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
        $delegate->stores_id=json_encode($request->input('stores_id'),JSON_HEX_QUOT);

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
