<?php
use App\Good;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Request;



////////////////////////////////////////// Admin Route/////////////////////////////////// 

//display delegate stores
Route::post('admin/delegates/getStore', 'admin\DelegatesController@getStore');

//new inventory 
Route::get('admin/inventory', 'admin\NewInventoreyController@index');
Route::get('admin/inventory/add', 'admin\NewInventoreyController@add');
Route::get('admin/inventory/edit/{id}', 'admin\NewInventoreyController@edit');
Route::get('admin/inventory/delete/{id}', 'admin\NewInventoreyController@delete');

//Route::post('admin/inventory/add', 'admin\NewInventoreyController@add');
Route::post('admin/inventory/loadProducts', 'admin\NewInventoreyController@loadProducts');
Route::post('admin/inventory/addInventory', 'admin\NewInventoreyController@addInventory');
Route::post('admin/inventory/editInventory/{id}', 'admin\NewInventoreyController@editInventory');




Route::get('admin/load/{id}', 'admin\DashboardController@Load');
Route::post('admin/add', 'admin\DashboardController@addOrder');
Route::group(['middleware' => ['web']], function () {
     Route::get('admin','admin\AdminController@login');
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
      Route::controller('reports','admin\ReportsController');
      Route::get('/stores/inventory/{id}', 'admin\StoresController@inventory');

     // Route::get('/stores/allinventory/{id}', 'admin\StoresController@showInventory');

      Route::get('/stores/goods/{id}', 'admin\StoresController@goods');
      Route::post('/stores/inventory', 'admin\StoresController@inventory');
      
     
  });    
    
});

////////////////////////////////////////// Front Route /////////////////////////////////////////////////// \\

    Route::controller('/','front\HomeController');

    //Route::get('/load', 'admin\DashboardController@getLoad');
    Route::get('/admin', 'admin\DashboardController@index');
    



