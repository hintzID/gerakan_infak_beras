<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\OtaController;
use App\Http\Controllers\PesantrenController;
use App\Http\Controllers\DonasiTerimaController;
use App\Http\Controllers\DonasiPenyaluranController;
use App\Http\Controllers\StokBarangController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::resource('anggotas', AnggotaController::class);
    Route::resource('otas', OtaController::class);
    Route::resource('pesantrens', PesantrenController::class);
    Route::resource('donasi_terimas', DonasiTerimaController::class);
    Route::resource('donasi_penyalurans', DonasiPenyaluranController::class);
    Route::resource('stok_barangs', StokBarangController::class);


});
