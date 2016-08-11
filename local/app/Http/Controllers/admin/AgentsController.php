<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\DelegateRequest;
use Session;
use App\Agent;
use App\Place;
use Auth;
class AgentsController extends Controller
{
    public function getAllAgents(){
    	$agents = Agent::get();
    	return view ('admin.pages.agents.allagents' , compact('agents'));
    }
 
    public function getPoints(){
        
        $agents = Agent::where('name',Auth::guard('admins')->user()->name)->get();
        return view ('admin.pages.agents.points' , compact('agents'));
    }
   
    public function postAdd(DelegateRequest $request){
    	$plumber = new Agent();
        
    	$plumber->name=$request->input('name');
        $plumber->phone=$request->input('phone');
        $plumber->address=$request->input('address');
        $plumber->buy_points=$request->input('buy_points');
        $plumber->back_points=$request->input('back_points');
        $plumber->credit=$request->input('credit');
        
        $plumber->code=$request->get('code');
        $plumber->code= substr($plumber->credit, 9);
        $file=$request->file('image'); 
        $destinationpath  ='uploads/admins';
        $filename=$file->getClientOriginalName();
        $file ->move ($destinationpath,$filename);
        $plumber->image=$filename;
        $plumber->admin_id=Auth::guard('admins')->user()->id;
        $plumber->save();

        session()->push('success','تمت الاضافة بنجاح');
    	return redirect('agents/all-agents');

    }
    public function getAllPlaces(){
        $place = Place::get();
        return view ('admin.pages.agents.allplaces' , compact('place'));
    }
    public function postAddPlace(Request $request){
        $place = new Place();
        $place->name=$request->input('name');

        $file=$request->file('image'); 
        $destinationpath  ='uploads/places';
        $filename=$file->getClientOriginalName();
        $file ->move ($destinationpath,$filename);
        $place->image=$filename; 
        $place->agent_id=Auth::guard('admins')->user()->id;
       
        $place->save();

        session()->push('success','تمت الاضافة بنجاح');
        return redirect('agents/all-places');

    }
    
     public function getEdit($id){
     	$old =Agent::find($id);
     	return view ('admin.pages.agents.editagent' , compact('old'));

    }
    public function postEdit(Request $request , $id){
    	$plumber =Agent::find($id);
    	$plumber->code=$request->input('code');
        $plumber->name=$request->input('name');
        $plumber->phone=$request->input('phone');
        $plumber->address=$request->input('address');
        $plumber->buy_points=$request->input('buy_points');
        $plumber->back_points=$request->input('back_points');
        $plumber->credit=$request->input('credit');
        
        $file = $request->file('image');
        if ($file) {
            $destinationpath = 'uploads/admins';
            $filename = $file->getClientOriginalName();
            @unlink(base_path("../{$destinationpath}/{$plumber->image}"));
            $file->move($destinationpath, $filename);
            $plumber->image = $filename;
        }

        $plumber->save();
        session()->push('success','تم التعديل بنجاح');
    	return redirect('agents/all-agents');

    }

    public function getDelete($id){
    	$delete = Agent::find($id);
    	$delete->delete();
    	return redirect('agents/all-agents'); 
    }
}
