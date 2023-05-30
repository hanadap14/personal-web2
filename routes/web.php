<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages;
use App\Http\Controllers\Admin;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Experience;
use App\Http\Controllers\Portfolio;
use App\Http\Controllers\Category;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [Pages::class, 'index'])->name('home');

Route::get('login',[AuthController::class,'index'])->name('login')->middleware('guest');
Route::post('login',[AuthController::class,'login'])->middleware('guest');;
Route::post('logout',[AuthController::class,'logout'])->middleware('auth');;

Route::group(['prefix' => 'admin','middleware' => 'auth'], function(){
    Route::resource('/', Admin::class);
    Route::resource('experience',Experience::class);
    Route::put('portfolio/{portfolio}/change',[Portfolio::class,'changeimage']);
    Route::resource('portfolio',Portfolio::class);
    Route::resource('category',Category::class);
});