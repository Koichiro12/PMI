<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Biodata\BiodataController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Keuangan\KeuanganController;
use App\Http\Controllers\PMI\KategoriFileController;
use App\Http\Controllers\PMI\PMIController;
use App\Http\Controllers\Users\UsersController;
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
Route::get('/signin',[AuthController::class,'viewLogin'])->name('login');
Route::post('/signin/auth',[AuthController::class,'auth'])->name('auth');
Route::get('/signout',[AuthController::class,'logout'])->name('logout');
Route::get('/reload-captcha', [AuthController::class, 'loadCaptcha']);

Route::group(['middleware'=>['prevent-back','auth']],function(){
    Route::get('/',[DashboardController::class,'index'])->name('dashboard');
    
    Route::get('/profile',[ProfileController::class,'index'])->name('profile');
    Route::post('/profile/update',[ProfileController::class,'updateProfile'])->name('profile.update');

    //Biodata
    Route::get('biodata/{id}/printPdf',[BiodataController::class,'printPdf'])->name('biodata.printPDF');
    Route::get('biodata/list',[BiodataController::class,'list'])->name('biodata.list');
    Route::resource('biodata',BiodataController::class);
    
    
    //PMI
    Route::resource('category_files',KategoriFileController::class);
    Route::get('kategori_file/list',[KategoriFileController::class,'list'])->name('kategori_file.list');


    Route::get('/PMI',[PMIController::class,'index'])->name('pmi.index');
    
    
    //Keuangan
    Route::get('/Keuangan',[KeuanganController::class,'index'])->name('keuangan.index');
    
    
    //Pengguna
    Route::get('pengguna/list',[UsersController::class,'list'])->name('pengguna.list');
    Route::resource('pengguna',UsersController::class);
}); 