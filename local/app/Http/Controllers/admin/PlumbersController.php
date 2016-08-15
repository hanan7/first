<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Plumber;
use App\Place;
use Auth;
class PlumbersController extends Controller
{
    public function getAllPlumbers(){
    	$plumbers = Plumber::get();
    	return view ('admin.pages.plumbers.allplumbers' , compact('plumbers'));
    }
 
    public function getPoints(){
        $plumbers = Plumber::where('admin_id',Auth::guard('admins')->user()->id)->get();
        return view ('admin.pages.plumbers.points' , compact('plumbers'));
    }
   
    public function postAdd(Request $request){
    	$plumber = new Plumber();
        $plumber->code=$request->input('code');
    	$plumber->name=$request->input('name');
        $plumber->phone=$request->input('phone');
        $plumber->address=$request->input('address');
        $plumber->points=$request->input('points');
        $plumber->save();

        session()->push('success','تمت الاضافة بنجاح');
    	return redirect('plumbers/all-plumbers');

    }
    public function getAllPlaces(){
        $place = Place::get();
        return view ('admin.pages.plumbers.allplaces' , compact('place'));
    }
    public function postAddPlace(Request $request){
        $Place = new Place();
        $place->name=$request->input('name');
        $place->agent_name=$request->input('agent_name');
        $place->phone=$request->input('phone');
        $place->address=$request->input('address');

        $file=$request->file('image'); 
        $destinationpath  ='uploads/places';
        $filename=$file->getClientOriginalName();
        $file ->move ($destinationpath,$filename);
        $place->image=$filename; 
        $place->plumber_id=Auth::guard('admins')->user()->id;
       
        $place->save();

        session()->push('success','تمت الاضافة بنجاح');
        return redirect('plumbers/all-places');

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
        $plumber->points=$request->input('points');

        $plumber->save();

        session()->push('success','تم التعديل بنجاح');
    	return redirect('plumbers/all-plumbers');

    }

    public function getDelete($id){
    	$delete = Plumber::find($id);
    	$delete->delete();
    	return redirect('plumbers/all-plumbers'); 
    }
}
