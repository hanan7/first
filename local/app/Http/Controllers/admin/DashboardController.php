<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;


use App\Good;
use App\Agent;
use App\sub_delegator;
use App\Store;
use App\Sales_operations;

use App\Http\Requests;

class DashboardController extends Controller
{
    
    
    public function index(){
        $goods=Good::all();
    	$agent=Agent::all();
    	$stores=Store::all();
    	$sub_delegator=sub_delegator::all();

        return view('admin.index',compact('goods','agent','sub_delegator','stores'));
    }

    public function load($id){

        $data['goods']=Good::where('store_id',$id)->get();
        $data['response']=1;

        if(!count($data['goods'])>0)
        {
             $data['response']=0;
        }
        return response()->json($data);
    	
    }

    public function addOrder(OrderRequest $Request)
    {
       
        $Sales_operations=new Sales_operations($Request->except('_token'));
        $Sales_operations->save();
        session()->push('success','تمت الاضافة بنجاح');
        return redirect('admin');
    }
    
   
}
