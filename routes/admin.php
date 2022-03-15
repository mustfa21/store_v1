<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\SettingsController;


/*
|--------------------------------------------------------------------------
| admin  Routes
|--------------------------------------------------------------------------
|note we add prefix in routeserv provider
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

Route::group(['prefix' => 'admin','middleware'=>'auth:admin'],function(){
    Route::get('/',[DashboardController::class,'index'])->name('admin.dashboard');
    Route::get('/logout',[LoginController::class,'logout'])->name('admin.logout');
    Route::group(['prefix' => 'settings', 'middleware' =>'auth:admin' ], function () {
        Route::get('shipping-methods/{type}', [SettingsController::class, 'editShippingMethods'])->name('edit.shippings.methods');
        Route::put('shipping-methods/{id}', [SettingsController::class,'updateShippingMethods'])->name('update.shippings.methods');
    });

});
Route::group(['prefix' => 'admin','middleware'=>'guest:admin'],function(){

    Route::get('login',[LoginController::class,'login'])->name('admin.login');
    Route::post('login',[LoginController::class,'postlogin'])->name('admin.postlogin');

});






});
