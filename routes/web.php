<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Biodata\BiodataController;
use App\Http\Controllers\Biodata\QuestionsController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Keuangan\KategoriPembayaranController;
use App\Http\Controllers\Keuangan\KeuanganController;
use App\Http\Controllers\PMI\KategoriFileController;
use App\Http\Controllers\PMI\PMIController;
use App\Http\Controllers\SelectedInformation\SelectedInformationController;
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


    Route::resource('questions',QuestionsController::class);
    Route::get('pertanyaan/list',[QuestionsController::class,'list'])->name('questions.list');

    //Biodata
    Route::get('biodata/{id}/printPdf',[BiodataController::class,'printPdf'])->name('biodata.printPDF');
    Route::get('biodata/list',[BiodataController::class,'list'])->name('biodata.list');
    Route::resource('biodata',BiodataController::class);
    
    
    //PMI
    Route::resource('category_files',KategoriFileController::class);
    Route::get('kategori_file/list',[KategoriFileController::class,'list'])->name('kategori_file.list');


    Route::get('/PMI',[PMIController::class,'index'])->name('pmi.index');
    Route::get('PMI/{id}/edit',[PMIController::class,'edit'])->name('pmi.edit');
    Route::post('PMI/{id}/update',[PMIController::class,'update'])->name('pmi.update');
    Route::get('/PMI/list',[PMIController::class,'list'])->name('pmi.list');

    Route::get('/PMIFiles/{id}/destroy',[PMIController::class,'deleteFile'])->name('pmi_files.delete');
    
    //Keuangan
    Route::get('/Keuangan',[KeuanganController::class,'index'])->name('keuangan.index');
    Route::get('/Keuangan/list',[KeuanganController::class,'list'])->name('keuangan.list');
    Route::get('/Keuangan/{id}/Biaya',[KeuanganController::class,'Biaya'])->name('keuangan.biaya');
    Route::post('/Keuangan/{id}/Biaya',[KeuanganController::class,'setBiaya'])->name('keuangan.setbiaya');
    
    Route::get('/Keuangan/{id}/detail',[KeuanganController::class,'detail'])->name('keuangan.detail');
    Route::get('/Keuangan/{id}/detail/payment',[KeuanganController::class,'PaymentList'])->name('keuangan_detail.payment');
    Route::post('/Keuangan_detail/payment/store',[KeuanganController::class,'StorePayment'])->name('keuangan_detail.store');
    Route::put('/Keuangan_detail/payment/{id}/update',[KeuanganController::class,'UpdatePayment'])->name('keuangan_detail.update');
    Route::delete('/Keuangan_detail/payment/{id}/delete',[KeuanganController::class,'DestroyPayment'])->name('keuangan_detail.delete');

    Route::resource('category_payment',KategoriPembayaranController::class);
    Route::get('kategori_pembayaran/list',[KategoriPembayaranController::class,'list'])->name('category_payment.list');
    
    Route::resource('selected_information',SelectedInformationController::class);
    Route::get('SelectedInformation/list',[SelectedInformationController::class,'list'])->name('selected_information.list');

    //Pengguna
    Route::get('pengguna/list',[UsersController::class,'list'])->name('pengguna.list');
    Route::resource('pengguna',UsersController::class);
}); 