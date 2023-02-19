<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class,'index']);
    //Kategóriák route
    Route::controller(App\Http\Controllers\Admin\KategoriaController::class)->group(function(){
        Route::get('kategoria','index');
        Route::get('kategoria/create',  'create');
        Route::post('kategoria','store');
        Route::get('kategoria/{category}/edit','edit');
        Route::put('kategoria/{category}','update');
    });
    //Termékek route
    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function(){
        Route::get('product','index');
        Route::get('product/create',  'create');
        Route::post('product','store');
        Route::get('product/{product}/edit','edit');
        Route::put('product/{product}','update');
        Route::get('product-image/{product_image_id}/delete','deleteImage');
        Route::get('product/{product}/delete','delete');
    });


});
