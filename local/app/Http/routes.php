<?php



////////////////////////////////////////// Admin Route /////////////////////////////////////////////////// 


Route::group(['middleware' => ['web']], function () {
    
     Route::controller('admin','admin\AdminController');
   //Route::controller('adminpanel','admin\DashboardController');

  Route::group(['middleware' => ['admins']], function () {
      
      Route::resource('admin','admin\DashboardController');
      Route::controller('users','admin\UsersController');
      Route::controller('settings','admin\SettingsController');
      Route::controller('products','admin\ProductsController');
      Route::controller('stores','admin\StoresController');
      Route::controller('traders','admin\TradersController');
      Route::controller('employees','admin\EmployeesController');
      Route::controller('delegates','admin\DelegatesController');
      Route::controller('plumbers','admin\PlumbersController');
      Route::controller('suppliers','admin\SuppliersController');
      Route::controller('orders','admin\OrdersController');
     
  });    
    
});

////////////////////////////////////////// Front Route /////////////////////////////////////////////////// \\

    Route::controller('home','front\HomeController');
    



