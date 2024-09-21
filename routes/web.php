<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

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
Route::get('/template',[DashboardController::class,'template'])->name('dashboard');
Route::get('/signin',[AuthController::class,'viewLogin'])->name('login');
Route::post('/signin/auth',[AuthController::class,'auth'])->name('auth');
Route::group(['middleware'=>['prevent-back','auth']],function(){
    Route::get('/',[DashboardController::class,'index'])->name('dashboard');

});