<?php



////////////////////////////////////////// Admin Route /////////////////////////////////////////////////// 


Route::group(['middleware' => ['web']], function () {
    
     Route::controller('admin','admin\AdminController');
   //Route::controller('adminpanel','admin\DashboardController');

  Route::group(['middleware' => ['admins']], function () {
      
      Route::resource('admin','admin\DashboardController');
      Route::controller('users','admin\UsersController');
      Route::controller('settings','admin\SettingsController');
      Route::controller('seeds','admin\SeedsController');
      Route::controller('owners','admin\OwnersController');
      Route::controller('products','admin\ProductsController');
      Route::controller('stores','admin\StoresController');
      Route::controller('traders','admin\TradersController');
      Route::controller('employees','admin\EmployeesController');
      Route::controller('delegates','admin\DelegatesController');
      Route::controller('agents','admin\AgentsController');
      Route::controller('suppliers','admin\SuppliersController');
      Route::controller('orders','admin\OrdersController');
      Route::controller('msgs','admin\MsgsController');
      Route::controller('delegates','admin\DelegatesController');
      Route::controller('subDelegates','admin\SubDelegatesController');
      Route::get('/stores/inventory/{id}', 'admin\StoresController@inventory');

     // Route::get('/stores/allinventory/{id}', 'admin\StoresController@showInventory');

      Route::get('/stores/goods/{id}', 'admin\StoresController@goods');
      Route::post('/stores/inventory', 'admin\StoresController@inventory');
      
     
  });    
    
});

////////////////////////////////////////// Front Route /////////////////////////////////////////////////// \\

    Route::controller('/','front\HomeController');
    



