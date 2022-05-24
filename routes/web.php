<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnggotaKeluargaController;
use App\Http\Controllers\SuratKelahiranController;
use App\Http\Controllers\SuratKematianController;
use App\Http\Controllers\SuratMenjadiPendudukController;
use App\Http\Controllers\SuratPindahController;
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
Auth::routes();

Route::get('/', function () {
    return view('home');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('logout', [Auth::class, 'logout'], function () {
    return abort(404);
});

Route::resource('keluarga', AnggotaKeluargaController::class)->middleware('auth');
Route::resource('surat-kelahiran', SuratKelahiranController::class)->middleware('auth');
Route::resource('surat-kematian', SuratKematianController::class)->middleware('auth');
Route::resource('surat-pindah', SuratPindahController::class)->middleware('auth');
Route::resource('surat-penduduk', SuratMenjadiPendudukController::class)->middleware('auth');
Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('/surat-kelahiran', [AdminController::class, 'suratKelahiran'])->name('admin.surat-kelahiran');
    Route::get('/surat-kelahiran/{id}', [AdminController::class, 'accSuratKelahiran'])->name('admin.acc-surat-kelahiran');
    Route::get('/surat-kematian', [AdminController::class, 'suratKematian'])->name('admin.surat-kematian');
    Route::get('/surat-kematian/{id}', [AdminController::class, 'accSuratKematian'])->name('admin.acc-surat-kematian');
    Route::get('/surat-pindah', [AdminController::class, 'suratPindah'])->name('admin.surat-pindah');
    Route::get('/surat-pindah/{id}', [AdminController::class, 'accSuratPindah'])->name('admin.acc-surat-pindah');
    Route::get('/surat-penduduk', [AdminController::class, 'suratPenduduk'])->name('admin.surat-penduduk');
    Route::get('/surat-penduduk/{id}', [AdminController::class, 'accSuratPenduduk'])->name('admin.acc-surat-penduduk');
});