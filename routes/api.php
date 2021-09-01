<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix'=>'user'],function(){
    Route::post('register',[AuthenticationController::class,'registration'])->name('user.register');
    Route::post('login',[AuthenticationController::class,'login'])->name('user.login');
});
Route::group(['prefix'=>'products'],function(){
    Route::get('',[ProductController::class,'index'])->name('products.show');
});
Route::group(['prefix'=>'product'],function(){
    Route::post('',[ProductController::class,'create'])->name('product.create');
    Route::post('/{id}',[ProductController::class,'edit'])->name('product.edit');
    Route::get('/{id}',[ProductController::class,'detail'])->name('product.detail');
    Route::delete('/{id}',[ProductController::class,'destroy'])->name('product.destroy1');
});
