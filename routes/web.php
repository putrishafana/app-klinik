<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Master\TindakanController;
use App\Http\Controllers\Master\PegawaiController;
use App\Http\Controllers\Master\WilayahController;
use App\Http\Controllers\Master\ObatController;
use App\Http\Controllers\Transaksi\PendaftaranPasienController;
use App\Http\Controllers\Transaksi\PemeriksaanController;
use App\Http\Controllers\Transaksi\PelayananObatController;
use App\Http\Controllers\Transaksi\PembayaranController;
use App\Http\Controllers\Transaksi\PasienController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanController;

Route::get('/', function () {
    return redirect('/login');
});


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('laporan', [LaporanController::class, 'index']);
Route::post('logout', [UserController::class, 'logout']);

Route::middleware(['auth', 'role:1'])->group(function () {
    Route::resource('tindakan', TindakanController::class);
    Route::resource('pegawai', PegawaiController::class);
    Route::resource('wilayah', WilayahController::class);
    Route::resource('obat', ObatController::class);
    Route::get('resep-obat/{id}', [PemeriksaanController::class, 'resepObat']);
    Route::get('invoice/{id}', [PembayaranController::class, 'invoice']);
    Route::get('pembayaran-periksa/{id}', [PemeriksaanController::class, 'pembayaran']);
    Route::resource('pelayanan-obat', PelayananObatController::class);
    Route::resource('user', UserController::class);
    Route::resource('pasien', PasienController::class);
});

Route::middleware(['auth', 'role:1,2'])->group(function () {
    Route::get('pemeriksaan-pasien/{id}', [PendaftaranPasienController::class, 'createPemeriksaan']);
    Route::resource('pendaftaran-pasien', PendaftaranPasienController::class);
});

Route::middleware(['auth', 'role:1,2,3'])->group(function () {
    Route::resource('pemeriksaan', PemeriksaanController::class);
});

Route::middleware(['auth', 'role:1,3'])->group(function () {
    Route::get('resep-obat/{id}', [PemeriksaanController::class, 'resepObat']);
    Route::resource('pelayanan-obat', PelayananObatController::class);
});

Route::middleware(['auth', 'role:1,3,4'])->group(function () {
    Route::get('pembayaran-periksa/{id}', [PemeriksaanController::class, 'pembayaran']);
    Route::resource('pembayaran', PembayaranController::class);
});

Route::middleware(['auth', 'role:1,4'])->group(function () {
    Route::get('invoice/{id}', [PembayaranController::class, 'invoice']);
});

require __DIR__.'/auth.php';