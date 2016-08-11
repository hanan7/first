<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use App\Http\Requests;
use App\Http\Requests\DelegateRequest;
use App\Msg;
use App\Vmsg;
use App\Admin;
use Auth;

class MsgsController extends Controller
{
      
  public function __construct() {
  }

    public function getAllMsgs() {
        $msg = Vmsg::get();      
         return view('admin.pages.msgs.allmsgs',array("msg"=>$msg)); 
    }

    public function getAdminMsgs() {
   		if(Auth::guard('admins')->user()->flag==2 || Auth::guard('admins')->user()->flag==3 || Auth::guard('admins')->user()->flag==4){
   			
   			$msg=Msg::where('name',Auth::guard('admins')->user()->name)->get();
    	}
        else{

            $msg=Msg::get(); 
        }     
        return view('admin.pages.msgs.adminmsgs',array("msg"=>$msg)); 
    }
    
    public function postAddMsg(DelegateRequest $request) {
    	$msg = new Msg();
    	$msg->name = $request->input('name');
		$msg->content = $request->input('content');
		$msg->admin_id=Auth::guard('admins')->user()->id;
		$msg->save();

        return redirect('msgs/admin-msgs'); 
    }
 
    public function getDelete($id){
    	$delete = Msg::find($id);
    	$delete->delete();
    	if(Auth::guard('admins')->user()->flag==2 || Auth::guard('admins')->user()->flag==3 || Auth::guard('admins')->user()->flag==4){
    		$delete = Msg::find($id);
    	    $delete->delete();
            return redirect('msgs/admin-msgs'); 
        }
        else{
        	$delete = Vmsg::find($id);
    		$delete->delete();
        	return redirect('msgs/all-msgs'); 
        }  
    }
}
