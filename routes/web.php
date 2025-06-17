<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeShowController;
use App\Http\Controllers\CekGratisController;
use App\Http\Controllers\ProgramPelangganController;
use App\Http\Controllers\AuthLogin;

Route::get('/', [HomeShowController::class, 'ProductShow'])->name('home');

Route::get('/cekgratis', function () {
    return view('Cek_Gratis');
});

Route::get('/dashboard_barang', function () {
    return view('administrator.dashboard_barang');
});
Route::get('/dashboard_cekgratis', function () {
    return view('administrator.dashboard_cek_gratis');
});

Route::get('/dashboard_paket', function () {
    return view('administrator.dashboard_paket');
});

Route::get('/dashboard_regprogpelanggan/{id}', function () {
    return view('administrator.dashboard_regprogpelanggan');
});

Route::get('/dashboard_regprogpelanggan', function () {
    return view('administrator.dashboard_regprogpelanggan');
});

Route::get('/dashboard_register', function () {
    return view('administrator.dashboard_register');
});

Route::get('/Login', function () {
    return view('Login');
});

Route::get('/pelanggan/{id}', [ProgramPelangganController::class, 'ProgPelangganShow']);

Route::post('/cekgratis', [CekGratisController::class, 'store'])->name('cekgratis.store');
Route::post('/Login',[AuthLogin::class,'AuthUser']);

Route::get('/Logout',[AuthLogin::class,'Logout']);