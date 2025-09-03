<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LeandingPageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileMadrasahController;
use App\Http\Controllers\EkstrakulikulerController;
use App\Http\Controllers\GuruTendikController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\InformasiPendaftaranController;
use App\Http\Controllers\PendaftaranController;

/*
|--------------------------------------------------------------------------
| Landing Page
|--------------------------------------------------------------------------
*/
Route::get('/', [LeandingPageController::class, 'index'])->name('landing');

// Berita publik
Route::get('/home/berita', [LeandingPageController::class, 'index_berita'])->name('home.berita');
Route::get('/home/berita/{id}', [LeandingPageController::class, 'show_berita'])->name('home.berita.show');

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Data Master (Admin)
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth']], function() {
    Route::resource('profilemadrasah', ProfileMadrasahController::class);
    Route::resource('ekstrakulikuler', EkstrakulikulerController::class);
    Route::get('ekstrakulikuler/{id}/destroy', [EkstrakulikulerController::class, 'destroy'])->name('ekstrakulikuler.destroy');
    Route::resource('gurutendik', GuruTendikController::class);
    Route::get('gurutendik/{id}/destroy', [GuruTendikController::class, 'destroy'])->name('gurutendik.destroy');
    Route::resource('contact', ContactController::class);
    Route::resource('berita', BeritaController::class);
    Route::get('berita/{id}/destroy', [BeritaController::class, 'destroy'])->name('berita.destroy');

    // Data pendaftar (admin only)
    Route::get('/pendaftar', [PendaftaranController::class, 'index'])->name('daftar.index');
});

/*
|--------------------------------------------------------------------------
| Informasi Pendaftaran (Admin)
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth']], function() {
    Route::resource('informasipendaftaran', InformasiPendaftaranController::class);
});

/*
|--------------------------------------------------------------------------
| PPDB Online (Publik)
|--------------------------------------------------------------------------
| Bisa diakses tanpa login, navbar public sama dengan welcome page
*/
Route::get('/ppdb', [PendaftaranController::class, 'create'])->name('ppdb');
Route::post('/ppdb', [PendaftaranController::class, 'store'])->name('ppdb.store');
