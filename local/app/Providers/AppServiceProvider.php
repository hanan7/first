<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Setting;
use App\Trader;
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
        $sections = Setting::find($id);
        $trader = Trader::find($id);
         view()->share(['sections'=>$sections , 'trader'=>$trader]);
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
