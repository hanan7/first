<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Seed;
class SeedsController extends Controller
{
    public function getAllSeeds(){
    	$seeds = Seed::get();
    	return view ('admin.pages.seeds.allseeds' , compact('seeds'));
    }

     public function postAdd(Request $request){
        $emp= new Seed();
        $emp->seed=$request->input('seed');
        $emp->value=$request->input('value');
        $emp->cons_rate=$request->input('cons_rate');
        $emp->save();

        session()->push('success','تمت الاضافة بنجاح');
        return redirect('seeds/all-seeds');

    }
    
    public function getEdit($id){
        $old = Seed::find($id);
        return view ('admin.pages.seeds.editseed' , compact('old'));

    }
    public function postEdit(Request $request , $id){
        $emp =Seed::find($id);
        $emp->seed=$request->input('seed');
        $emp->value=$request->input('value');
        $emp->cons_rate=$request->input('cons_rate');
        $emp->save();

        session()->push('success','تم التعديل بنجاح');
        return redirect('seeds/all-seeds');

    }

    public function getDelete($id){
        $delete = Seed::find($id);
        $delete->delete();
        return redirect('seeds/all-seeds'); 
    }
}
