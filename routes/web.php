<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminObatController;
use App\Http\Controllers\AdminPasienController;
use App\Http\Controllers\AdminPenangananController;
use App\Http\Controllers\AdminPenggunaController;
use App\Http\Controllers\AdminRekamMedisBalitaController;
use App\Http\Controllers\AdminRekamMedisBersalinController;
use App\Http\Controllers\AdminRekamMedisController;
use App\Http\Controllers\AdminRekamMedisImunisasiController;
use App\Http\Controllers\AdminRekamMedisKBController;
use App\Http\Controllers\AdminRekamMedisKehamilanController;
use App\Http\Controllers\AdminRekamMedisNifasController;
use App\Http\Controllers\Exportpdf;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RekamMedisBalitaController;
use App\Http\Controllers\RekamMedisBersalinController;
use App\Http\Controllers\RekamMedisImunisasiController;
use App\Http\Controllers\RekamMedisKBController;
use App\Http\Controllers\RekamMedisKehamilanController;
use App\Http\Controllers\RekamMedisNifasController;
use App\Http\Controllers\SettingPasswordController;
use App\Http\Controllers\SettingProfileController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserPasienController;
use App\Http\Controllers\UserRekamMedisController;
use Illuminate\Support\Facades\Route;
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
// ----------------------------Login dan Registarai--------------------------------

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// --------------------------------------Admin--------------------------------------

Route::get('/admin', [AdminController::class, 'index'])->middleware('admin');

Route::resource('/admin/pengguna', AdminPenggunaController::class)->except('create', 'edit', 'show')->middleware('admin');

Route::resource('/admin/obat', AdminObatController::class)->except('create', 'edit', 'show')->middleware('admin');

Route::resource('/admin/penanganan', AdminPenangananController::class)->except('create', 'edit', 'show')->middleware('admin');

Route::resource('/admin/pasien', AdminPasienController::class)->except('create', 'edit', 'show')->middleware('admin');

Route::get('/laporan/transaksi', [TransaksiController::class, 'index'])->name('laporan.transaksi')->middleware('admin');

Route::resource('/admin/rekam_medis/umum', AdminRekamMedisController::class)->only('index')->middleware('admin');

Route::resource('/admin/rekam_medis/bersalin', AdminRekamMedisBersalinController::class)->only('index')->middleware('admin');

Route::resource('/admin/rekam_medis/kb', AdminRekamMedisKBController::class)->only('index')->middleware('admin');

Route::resource('/admin/rekam_medis/imunisasi', AdminRekamMedisImunisasiController::class)->only('index')->middleware('admin');

Route::resource('/admin/rekam_medis/balita', AdminRekamMedisBalitaController::class)->only('index')->middleware('admin');

Route::resource('/admin/rekam_medis/kehamilan', AdminRekamMedisKehamilanController::class)->only('index')->middleware('admin');

Route::resource('/admin/rekam_medis/nifas', AdminRekamMedisNifasController::class)->only('index')->middleware('admin');

Route::get('/admin/laporan/transaksi', [Exportpdf::class, 'laporan'])->middleware('admin');

Route::get('/admin/laporan/umum', [Exportpdf::class, 'rekamMedis'])->middleware('admin');
Route::get('/admin/laporan/bersalin', [Exportpdf::class, 'rekamMedisBersalin'])->middleware('admin');
Route::get('/admin/laporan/kb', [Exportpdf::class, 'rekamMedisKB'])->middleware('admin');
Route::get('/admin/laporan/imunisasi', [Exportpdf::class, 'rekamMedisImunisasi'])->middleware('admin');
Route::get('/admin/laporan/balita', [Exportpdf::class, 'rekamMedisBalita'])->middleware('admin');
Route::get('/admin/laporan/kehamilan', [Exportpdf::class, 'rekamMedisKehamilan'])->middleware('admin');
Route::get('/admin/laporan/nifas', [Exportpdf::class, 'rekamMedisNifas'])->middleware('admin');

Route::get('/admin/cetak_kartu/{pasien}', [Exportpdf::class, 'kartu'])->middleware('admin');

// --------------------------------------User--------------------------------------

Route::resource('/user/pasien', UserPasienController::class)->except('create', 'edit', 'show')->middleware('user');

Route::resource('/user/rekam_medis/umum', UserRekamMedisController::class)->only('index', 'store')->middleware('user');

Route::resource('/user/rekam_medis/bersalin', RekamMedisBersalinController::class)->only('index', 'create', 'store')->middleware('user');

Route::resource('/user/rekam_medis/kb', RekamMedisKBController::class)->only('index', 'store')->middleware('user');

Route::resource('/user/rekam_medis/imunisasi', RekamMedisImunisasiController::class)->only('index', 'store')->middleware('user');

Route::resource('/user/rekam_medis/balita', RekamMedisBalitaController::class)->only('index', 'store')->middleware('user');

Route::resource('/user/rekam_medis/kehamilan', RekamMedisKehamilanController::class)->only('index', 'create', 'store')->middleware('user');

Route::resource('/user/rekam_medis/nifas', RekamMedisNifasController::class)->only('index', 'store')->middleware('user');

Route::middleware(['user'])->group(function () {
    Route::resource('/user/transaksi', TransaksiController::class);
    Route::get('/user/transaksi/create', [TransaksiController::class, 'create'])->name('user.transaksi.create');
    Route::post('/user/transaksi/store', [TransaksiController::class, 'store'])->name('user.transaksi.store');

    Route::get('/user/struk/{id}/struk', [Exportpdf::class, 'cetakStruk'])->name('user.struk.struk');
    // Route::get('/user/transaksi', [Exportpdf::class, 'create'])->middleware('user');
});

Route::get('/user/cetak_kartu/{pasien}', [Exportpdf::class, 'kartu'])->middleware('user');

// -------------------------------------Kepala-------------------------------------
Route::get('/kepala/dashboard', [AdminController::class, 'index'])->middleware('kepala');
Route::resource('/kepala/transaksi', TransaksiController::class)->middleware('kepala');

Route::get('/admin/laporan/transaksi', [Exportpdf::class, 'laporan'])->middleware('kepala');

// ----------------------------------Settings--------------------------------------

Route::resource('/setting', SettingProfileController::class)->only('index', 'edit', 'update')->middleware('auth');
Route::resource('/setting/password', SettingPasswordController::class)->only('index', 'update')->middleware('auth');
