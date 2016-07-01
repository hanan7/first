<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Setting;
use Session;

class SettingsController extends Controller
{
    public function getGeneralSettings(){
    	 $id= 1;
        $sections=Setting::find($id);
        return view('admin.pages.settings.generalsetting' , compact('sections'));
    }
    
     public function postEdit(Request $request){
        $id=1;
        $sections=Setting::find($id);
    	$sections->site_name=$request->input('site_name');
    	$sections->address=$request->input('address');
    	$sections->phone=$request->input('phone');
    	$sections->mobile=$request->input('mobile');

        $file=$request->file('logo');
        if(!file_exists('uploads')){
        mkdir('uploads/',0777,true);
        }
        if($file !=""){
            $destinationpath  ='uploads';
            $filename=$file->getClientOriginalName();
            $file ->move ($destinationpath,$filename);
            $sections->logo=$filename;
        }    
    	$sections->about=$request->input('about');
    	$sections->trips_num=$request->input('trips_num');
    	$sections->trips_desc=$request->input('trips_desc');
    	$sections->agents_num=$request->input('agents_num');
    	$sections->agents_desc=$request->input('agents_desc');

    	$sections->email=$request->input('email');
    	$sections->googlePlus=$request->input('googlePlus');
    	$sections->facebook=$request->input('facebook');
    	$sections->twitter=$request->input('twitter');
    	$sections->linkedIn=$request->input('linkedIn');
    	$sections->instagram=$request->input('instagram');

    	$sections->meta_keyword=$request->input('meta_keyword');
    	$sections->meta_description=$request->input('mdesc');
    	$sections->meta_title=$request->input('meta_title');
    	
    	$sections->save();

    	session()->flash('success','تم الاضافة بنجاح');
    	return redirect('settings/general-settings');
    }
    
}
