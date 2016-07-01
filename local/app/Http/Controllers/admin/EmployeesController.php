<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Employee;
class EmployeesController extends Controller
{
    public function getAllEmployees(){
    	$emp = Employee::get();
    	return view ('admin.pages.employees.allemployees' , compact('emp'));
    }
   
    public function postAdd(Request $request){
    	$emp = new Employee();
        $emp->code=$request->input('code');
    	$emp->name=$request->input('name');
        $emp->phone=$request->input('phone');
        $emp->address=$request->input('address');
        $emp->job=$request->input('job');
        $emp->salary=$request->input('salary');
        $emp->contract_date=$request->input('contract_date');
        $emp->end_date=$request->input('end_date');

        $emp->save();

        session()->flash('success','تمت الاضافة بنجاح');
    	return redirect('employees/all-employees');

    }
    
     public function getEdit($id){
     	$old = Employee::find($id);
     	return view ('admin.pages.employees.editemployee' , compact('old'));

    }
    public function postEdit(Request $request , $id){
    	$emp =Employee::find($id);
    	$emp->code=$request->input('code');
        $emp->name=$request->input('name');
        $emp->phone=$request->input('phone');
        $emp->address=$request->input('address');
        $emp->job=$request->input('job');
        $emp->salary=$request->input('salary');
        $emp->contract_date=$request->input('contract_date');
        $emp->end_date=$request->input('end_date');

        $emp->save();

        session()->flash('success','تم التعديل بنجاح');
    	return redirect('employees/all-employees');

    }

    public function getDelete($id){
    	$delete = Employee::find($id);
    	$delete->delete();
    	return redirect('employees/all-employees'); 
    }
}
