<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests\DelegateRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Owner;
class OwnersController extends Controller
{
    public function getAllOwners(){
        $owners = Owner::get();
        return view ('admin.pages.owners.allowners' , compact('owners'));
    }
     public function postAdd(Request $request){
        $owner = new Owner();
        $owner->name=$request->input('name');
        $owner->phone=$request->input('phone');
        $owner->email=$request->input('email');
        $owner->address=$request->input('address');
        $owner->money=$request->input('money');
        $owner->save();

        session()->push('success','تمت الاضافة بنجاح');
        return redirect('owners/all-owners');

    }
    
    public function getEdit($id){
        $old = Owner::find($id);
        return view ('admin.pages.owners.editowner' , compact('old'));

    }
    public function postEdit(Request $request , $id){
        $owner =Owner::find($id);
        $owner->name=$request->input('name');
        $owner->phone=$request->input('phone');
        $owner->email=$request->input('email');
        $owner->address=$request->input('address');
        $owner->money=$request->input('money');
        $owner->save();

        session()->push('success','تم التعديل بنجاح');
        return redirect('owners/all-owners');

    }

    public function getDelete($id){
        $delete = Owner::find($id);
        $delete->delete();
        return redirect('owners/all-owners');
    }
}