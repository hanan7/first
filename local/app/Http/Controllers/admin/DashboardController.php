<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;

class DashboardController extends Controller
{
    
    
    public function index(){
        return view('admin.index');
    }
    
   
}
