<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use App\Http\Requests;
use App\Admin;
use App\Role;
use Auth;

class UsersController extends Controller {

    public function getAll() {
        $users = Admin::get();
        return view('admin.pages.users.allusers', array("users" => $users));
    }

    public function postAdd(Request $request) {
        $file = $request->file('photo');
        $destinationpath = 'uploads/admins';
        $filename = $file->getClientOriginalName();
        $file->move($destinationpath, $filename);

        $user = Admin::create([
                    'name' => $request->input("name"),
                    'username' => $request->input("username"),
                    'email' => $request->input("email"),
                    'address' => $request->input("address"),
                    'phone' => $request->input("phone"),
                    'other' => $request->input("other"),
                    'password' => bcrypt($request->input("password")),
                    'flag' => $request->get("roles_select"),
                    'photo' => $filename,
        ]);

        session()->push('success', 'تمت الاضافة بنجاح');
        return redirect("users/all");
    }

    public function getEdit($id) {

        $user = Admin::find($id);
        $roles = Role::get();
        return view("user.edit", array("user" => $user, "roles" => $roles));
    }

    public function postEdit(Request $request, $id) {

        $user = Admin::find($id);
        $user->name = $request->get("name");
        $user->email = $request->get("email");
        if (!empty($request->get("password")))
            $user->password = bcrypt($request->get("password"));
        $user->save();

        $user->roles()->detach();
        if ($request->get("roles_select")) {
            foreach ($request->get("roles_select") as $role) {
                $user->attachRole($role);
            }
        }


        Session::flash('admin_updated', 'تم تعديل الادمن بنجاح ..');
        return redirect("admins/edit/" . $user->id);
    }

    public function getDelete($id) {
        $user = Admin::findOrFail($id);
        $user->delete();
        return redirect("users/all");
    }

}
