<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use App\Http\Requests;
use App\Admin;
use App\Role;
use Auth;

class UsersController extends Controller
{
      
   public function __construct() {
        
    }
     
    public function getAll() {
         $users = Admin::get();      
         return view('admin.pages.users.allusers',array("users"=>$users)); 
    }
 

    public function postAdd(Request $request) {
        //if(!Auth::user()->hasRole("member")){
          //abort(404);
        //}

        $this->validate($request, [
            'name' => 'required|max:100',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required',
            'confirm-password' => 'required|same:password',
            ],['name.max'=>'الاسم لا يجب ان يزيد عن 100 حرف ',
           'email.email'=>'هذا الايميل غير صحيح',
           'email.max'=>'الايميل يجب ان لا يزيد عن 100 حرف ',
           'email.unique'=>'هذا الايميل موجود من قبل ',
           'confirm-password.same'=>'كلمه السر غير مطابقة'
           ]);
        DB::transaction(function() use($request){
            $user = new Admin();
            $user->name = $request->input("name"); 
            $user->username = $request->input("username");
            $user->email = $request->input("email");
            $user->password = bcrypt($request->input("password"));
            $user->save();

            $user1 = new Role();
            $user1->name = $request->get("roles_select");
            $user1->save();
        });
        Session::flash('admin_inserted', 'تم إضافة الادمن بنجاح ..');
        return redirect("users/add");
    }
    
    public function getEdit($id){
        
        $user = Admin::find($id);
        $roles = Role::get();
        return view("user.edit",array("user"=>$user,"roles"=>$roles));
    }
    public function postEdit(Request $request,$id){
        
        $user = Admin::find($id);
        $user->name = $request->get("name");
        $user->email = $request->get("email");
        if(!empty($request->get("password")))
            $user->password= bcrypt($request->get("password"));
        $user->save();
        
        $user->roles()->detach();
        if ($request->get("roles_select")) {
            foreach ($request->get("roles_select") as $role) {
                $user->attachRole($role);
            }
        }
       
        
        Session::flash('admin_updated', 'تم تعديل الادمن بنجاح ..');
        return redirect("admins/edit/".$user->id);
    }

    public function getDelete($id){
        $user = Admin::findOrFail( $id );        
        $user->delete();
        return redirect("users/all");
    }
    
    

}
