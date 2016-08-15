<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Setting;
use Session;
use Auth;
use App\Admin;
class SettingsController extends Controller
{
    public function getGeneralSettings(){
    if(Auth::guard('admins')->user()->flag==0){
    	$id= 1;
        
        $sections=Setting::find($id);
        return view('admin.pages.settings.generalsetting' , compact('sections'));
    }
    else{
        return('غير مسموح لك بدخول هذه الصفحة');
    }
    }

    public function getProfile(){
        $id=Auth::guard('admins')->user()->id;
        $admin = Admin::find($id);
        return view('admin.pages.settings.profile2' , compact('admin'));
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
    
    	$sections->email=$request->input('email');
    	$sections->facebook=$request->input('facebook');
    	$sections->twitter=$request->input('twitter');
    	$sections->instagram=$request->input('instagram');

    	$sections->meta_keyword=$request->input('meta_keyword');
    	$sections->meta_description=$request->input('mdesc');
    	$sections->meta_title=$request->input('meta_title');
    	
    	$sections->save();

    	session()->push('success','تم الاضافة بنجاح');
    	return redirect('settings/general-settings');
    }
    
}
