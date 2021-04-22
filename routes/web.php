<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();



Route::group(['namespace'=>'Admin','middleware'=>'login'],function(){
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

    
    Route::get('logout','UserController@logout');

    //users
    Route::get('/users', 'UsersController@index');
    Route::delete('/delete-users/{id}', 'UsersController@destroy');
    Route::get('users/{id}/edit','UsersController@edit');
    Route::put('users/{id}','UsersController@update');
    Route::get('/add-users', 'UsersController@add');
    Route::post('/store-users', 'UsersController@store');


    //branch
    Route::get('/branch', 'BranchController@index');
    Route::delete('/delete-branch/{id}', 'BranchController@destroy');
    Route::get('branch/{id}/edit','BranchController@edit');
    Route::put('branch/{id}','BranchController@update');
    Route::get('/add-branch', 'BranchController@add');
    Route::post('/store-branch', 'BranchController@store');

    // customer
    Route::get('/customer', 'CustomerController@index');

    Route::get('/add-customer', 'CustomerController@add');
    Route::post('/store-customer', 'CustomerController@store');
    Route::post('/get-customer-data','CustomerController@edit');
    Route::post('/update-customer','CustomerController@update');
    Route::delete('/delete-customer/{id}', 'CustomerController@destroy');

    // broker
    Route::get('/broker', 'BrokerController@index');

    Route::get('/add-broker', 'BrokerController@add');
    Route::post('/store-broker', 'BrokerController@store');
    Route::post('/get-broker-data','BrokerController@edit');
    Route::post('/update-broker','BrokerController@update');
    Route::delete('/delete-broker/{id}', 'BrokerController@destroy');

    // purchaser
    Route::get('/purchaser', 'PurchaserController@index');
    Route::get('/add-purchaser', 'PurchaserController@add');
    Route::post('/store-purchaser', 'PurchaserController@store');
    Route::post('/get-purchase-data','PurchaserController@edit');
    Route::post('/update-purchaser','PurchaserController@update');
    Route::delete('/delete-purchaser/{id}', 'PurchaserController@destroy');

    // saler
    Route::get('/saler', 'SalerController@index');
    Route::get('/add-saler', 'SalerController@add');
    Route::post('/store-saler', 'SalerController@store');
    Route::post('/get-saler-data','SalerController@edit');
    Route::post('/update-saler','SalerController@update');
    Route::delete('/delete-saler/{id}', 'SalerController@destroy');

    //invoice
    Route::get('/invoice', 'InvoiceController@index');
    Route::get('/add-invoice', 'InvoiceController@add');
    Route::post('/store-invoice', 'InvoiceController@store');
    Route::post('/store-invoice-details', 'InvoiceController@storeDetails');
    // Route::post('/store-invoice-details-print', 'InvoiceController@storeDetailsAndPrint');
    Route::get('/invoice-details-print/{id}', 'InvoiceController@printInvoice');
    Route::get('invoice/{id}/edit','InvoiceController@edit');
    Route::put('invoice/{id}','InvoiceController@update');
    Route::delete('/delete-invoice/{id}', 'InvoiceController@destroy');
    Route::get('/gia-type-details/{type}', 'InvoiceController@getGiaDetails');
    Route::get('getbranch','InvoiceController@getbranch');


    //purchas
    Route::get('/purchas', 'PurchasController@index');
    Route::get('/add-purchas', 'PurchasController@add');
    Route::post('/store-purchas', 'PurchasController@store');
    Route::post('/store-purchas-details', 'PurchasController@storeDetails');
    Route::get('purchas/{id}/edit','PurchasController@edit');
    Route::put('purchas/{id}','PurchasController@update');
    Route::delete('/delete-purchas/{id}', 'PurchasController@destroy');

   //memo
   Route::get('/memo', 'MemoController@index');
   Route::get('/add-memo', 'MemoController@add');
   Route::post('/store-memo','MemoController@store');
   Route::post('/store-memo-details', 'MemoController@storeDetails');
   Route::get('memo/{id}/edit','MemoController@edit');
   Route::put('/memo/{id}','MemoController@update');
   Route::delete('/delete-memo/{id}', 'MemoController@destroy');
   Route::get('/get-current-no-gia-carat-stock/{giaId}/{memoDetailsId?}', 'MemoController@getCurrentNoGiaStock');
   Route::get('/delete-memo-details/{id}', 'MemoController@destroyInvoiceDetails');

 
  //payble
  Route::get('/payble', 'PaybleController@index');
  Route::get('/add-payble', 'PaybleController@add');
  Route::post('/store-payble','PaybleController@store');
  Route::post('/get-payble-data','PaybleController@edit');
  Route::post('/update-payble','PaybleController@update');
  Route::delete('/delete-payble/{id}', 'PaybleController@destroy');
  Route::get('/category', 'PaybleController@category');


   
   //receveable
    Route::get('/reciveable', 'ReciveableController@index');
    Route::get('/add-reciveable', 'ReciveableController@add');
    Route::post('/store-reciveable', 'ReciveableController@store');
    Route::post('/get-reciveable-data','ReciveableController@edit');
    Route::post('/update-reciveable','ReciveableController@update');
    Route::delete('/delete-reciveable/{id}', 'ReciveableController@destroy');


    //gia
    Route::get('/gia', 'GiaController@index');
    Route::get('/add-gia', 'GiaController@add');
    Route::post('store-gia', 'GiaController@store');
    Route::get('gia/{id}/edit','GiaController@edit');
    Route::put('gia/{id}','GiaController@update');
    Route::delete('/delete-gia/{id}', 'GiaController@destroy');
    
   
    //nogia
    Route::get('/nogia', 'NogiaController@index');
    Route::get('/add-nogia', 'NogiaController@add');
    Route::post('/store-nogia', 'NogiaController@store');
    Route::post('/get-nogia-data','NogiaController@edit');
    Route::post('/update-nogia','NogiaController@update');
    Route::delete('/delete-nogia/{id}', 'NogiaController@destroy');

  //category
  Route::get('/category', 'CategoryController@index');
  Route::post('/store-category', 'CategoryController@store');
  Route::post('/get-category-data','CategoryController@edit');
  Route::post('/update-category','CategoryController@update');
  Route::delete('/delete-category/{id}', 'CategoryController@destroy');

  //stock_transfer
  Route::get('/stock-transfer', 'StockTransferController@index');
  Route::post('/add-stock-transfer', 'StockTransferController@add');
  Route::get('/view-stock-transfer', 'StockTransferController@view');
  Route::delete('/delete-stockrequest/{id}', 'StockTransferController@destroy');


 

});
