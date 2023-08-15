<?php

use App\Http\Controllers\aduanController;
use App\Http\Controllers\detailUserController;
use App\Http\Controllers\galeriController;
use App\Http\Controllers\hargaPembayaranController;
use App\Http\Controllers\informasiController;
use App\Http\Controllers\jenisAduanController;
use App\Http\Controllers\kamarController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\mahasiswaController;
use App\Http\Controllers\pembayaranController;
use App\Http\Controllers\penghuniKamarController;
use App\Http\Controllers\registrasiController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Route::get('/home', function () {
    return view('home');
})->middleware('auth');


Route::get('/halaman-mahasiswa', function () {
    return view('pages.mahasiswa.index');
})->middleware('auth');




// login
Route::get('/login', [loginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/masuk', [loginController::class, 'authentication'])->middleware('guest');
Route::post('/logout', [loginController::class, 'logout'])->middleware('auth');

// Daftar
Route::get('/registrasi', [registrasiController::class, 'index']);
Route::post('/daftar', [registrasiController::class, 'store']);

// Detail Data User
Route::get('/my-profile/{id}', [detailUserController::class, 'index'])->middleware('auth');
Route::post('/add-data-user', [detailUserController::class, 'store'])->middleware('auth');
Route::put('/update-profile/{id}', [detailUserController::class, 'update'])->middleware('auth');

// Kamar
Route::get('/kamar', function () {
    return view('pages.kamar.index');
});
Route::get('/add-kamar', [kamarController::class, 'create'])->middleware('auth');
Route::get('/edit-kamar/{id}', [kamarController::class, 'edit'])->middleware('auth');
Route::post('/upload-kamar', [kamarController::class, 'store'])->middleware('auth');
Route::put('/update-kamar/{id}', [kamarController::class, 'update'])->middleware('auth');
Route::delete('/delete-kamar/{id}', [kamarController::class, 'destroy'])->middleware('auth');

// penghuni kamar
Route::get('/add-penghuni-kamar', [penghuniKamarController::class, 'create'])->middleware('auth');
Route::get('/edit-penghuni-kamar/{id}', [penghuniKamarController::class, 'edit'])->middleware('auth');
Route::post('/upload-penghuni-kamar', [penghuniKamarController::class, 'store'])->middleware('auth');
Route::put('/update-penghuni-kamar/{id}', [penghuniKamarController::class, 'update'])->middleware('auth');
Route::delete('/delete-penghuni-kamar/{id}', [penghuniKamarController::class, 'destroy'])->middleware('auth');

// Mahasiswa
Route::get('/data-mahasiswa', [mahasiswaController::class, 'index'])->middleware('auth');
Route::get('/add_data/mahasiswa/{id}', [mahasiswaController::class, 'create'])->middleware('auth');
Route::post('/upload-mahasiswa/{id}', [mahasiswaController::class, 'store'])->middleware('auth');
Route::get('/edit/mahasiswa/{id}', [mahasiswaController::class, 'edit'])->middleware('auth');
Route::put('/update-data-mahasiswa/{id}', [mahasiswaController::class, 'update'])->middleware('auth');


// Pengolahan User
Route::get('/datauser', [UserController::class, 'index'])->middleware('auth');
Route::post('/upload-user', [UserController::class, 'store'])->middleware('auth');
Route::put('/update-user/{id}', [UserController::class, 'update'])->middleware('auth');
Route::delete('/delete-user/{id}', [UserController::class, 'destroy'])->middleware('auth');


// Pembayar Admin
Route::get('/lihat-pembayaran', [pembayaranController::class, 'index'])->middleware('auth');
Route::put('/acc-pembayaran/{id}', [pembayaranController::class, 'update'])->middleware('auth');

// lunas
Route::get('/lunas', function () {
    return view('pages.pembayaran.lunas');
});


// Pembayaran user
Route::get('/tagihan', function () {
    return view('pages.pembayaran.tagihan');
});
Route::get('/buat-tagihan', [pembayaranController::class, 'create'])->middleware('auth');
Route::post('/upload-tagihan', [pembayaranController::class, 'store'])->middleware('auth');

// Harga_pembayaran
Route::get('/harga-pembayaran', [hargaPembayaranController::class, 'index'])->middleware('auth');
Route::post('/buat-harga', [hargaPembayaranController::class, 'store'])->middleware('auth');
Route::post('/update-harga/{id}', [hargaPembayaranController::class, 'update'])->middleware('auth');
Route::delete('/delete-nominal/{id}', [hargaPembayaranController::class, 'destroy'])->middleware('auth');

// Informasi

Route::get('/informasi', [informasiController::class, 'index'])->middleware('auth');
Route::get('/add-informasi', [informasiController::class, 'create'])->middleware('auth');
Route::get('/edit-informasi/{id}', [informasiController::class, 'edit'])->middleware('auth');
Route::post('/upload-informasi', [informasiController::class, 'store'])->middleware('auth');
Route::put('/update-informasi/{id}', [informasiController::class, 'update'])->middleware('auth');
Route::delete('/delete-informasi/{id}', [informasiController::class, 'destroy'])->middleware('auth');


// Aduan

Route::get('/aduan', [aduanController::class, 'index'])->middleware('auth');
Route::get('/data-aduan', [aduanController::class, 'dataAduan'])->middleware('auth');
Route::get('/add-aduan', [aduanController::class, 'create'])->middleware('auth');
Route::post('/upload-aduan', [aduanController::class, 'store'])->middleware('auth');
Route::put('/update-aduan/{id}', [aduanController::class, 'update'])->middleware('auth');
Route::delete('/delete-aduan/{id}', [aduanController::class, 'destroy'])->middleware('auth');

Route::put('/update/aduan/{id}', [aduanController::class, 'updateStatus'])->middleware('auth');
// jenis aduan
Route::post('/add-jenis-aduan', [jenisAduanController::class, 'store'])->middleware('auth');

// GAleri
Route::get('/galeri', [galeriController::class, 'galeri'])->middleware('guest');
Route::get('/data-galeri', [galeriController::class, 'index'])->middleware('auth');
Route::post('/upload-gambar', [galeriController::class, 'store'])->middleware('auth');
Route::put('/update-galeri/{id}', [galeriController::class, 'update'])->middleware('auth');
Route::delete('/delete-gambar/{id}', [galeriController::class, 'destroy'])->middleware('auth');
