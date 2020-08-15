<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::get('laundry', 'LaundryController@index')->name('Laundry');
Route::get('status', 'StatusController@index')->name('Status');
Route::get('History', 'HistoryController@index')->name('History');
Route::get('Laundry_Kiloan', 'LaundryController@laundrykiloan')->name('Laundry_Kiloan');
Route::get('Laundry_Satuan', 'LaundryController@laundrysatuan')->name('Laundry_Satuan');
Route::post('createlaundrysatuan', 'LaundryController@createsatuan');
Route::post('createlaundrykiloan', 'LaundryController@createkiloan');
Route::get('orderstatus', 'CartLaundryController@mycart')->name('orderstatus');
Route::post('orderstatus/postorder', 'CartLaundryController@postorder'); //post order
Route::get('orderstatus/deleteorder/{kode_orders}', 'CartLaundryController@deleteorder');
Route::post('orderstatus/detailorder', 'CartLaundryController@detailorders');
// ====================DASHBOARD ADMIN=====================================
Route::get('dashboard', 'DashboardController@index')->name('dashboard');
Route::post('dashboard/postsatuan', 'DashboardController@satuan');
Route::post('dashboard/postkiloan', 'DashboardController@kiloan');
Route::post('dashboard/postcuci', 'DashboardController@cuci');
Route::post('dashboard/postkering', 'DashboardController@kering');
Route::post('dashboard/poststrika', 'DashboardController@strika');
Route::post('dashboard/postserahkan', 'DashboardController@serahkan');
Route::post('dashboard/postbayar', 'DashboardController@bayar');


