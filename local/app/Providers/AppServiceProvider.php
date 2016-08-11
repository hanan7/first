<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Setting;
use App\Order;
use App\Msg;
use App\Admin;
use App\Employee;
use App\Store;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    { 
        
        $id = "1";
        $msgs= Msg::all();
        $msg_num=Msg::where('flag','0')->count();
        $order_num=Order::where('flag','1')->count();
        $sections = Setting::find($id);
        $orders = Order::get();

        $admin_num = Admin::count(); 
        $emp_num = Employee::count(); 
        $store_num = Store::count();

         view()->share(['sections'=>$sections , 'orders' =>$orders,'msgs'=>$msgs,'msg_num'=>$msg_num ,'order_num'=>$order_num ,'admin_num'=>$admin_num ,'emp_num'=>$emp_num ,'store_num'=>$store_num]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
