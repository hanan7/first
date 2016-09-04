<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Setting;
use App\Msg;
use App\Admin;
use App\Owner;
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
        $sections = Setting::find($id);

        $admin_num = Admin::count(); 
        $emp_num = Owner::count(); 
        $store_num = Store::count();

         view()->share(['sections'=>$sections ,'msgs'=>$msgs,'msg_num'=>$msg_num ,'admin_num'=>$admin_num ,'emp_num'=>$emp_num ,'store_num'=>$store_num]);
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
