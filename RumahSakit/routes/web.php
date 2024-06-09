<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\LaboranController;
use App\Http\Controllers\AuthenticationController;

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
// Routing Print
Route::get('/print', function () {return view('laboran.print');})->name('print');
Route::get('/loading', function () {return view('laboran.loading');})->name('loading');

// -------------------------------------------------------------------------------

Route::get('/',[HomeController::class,'index'])->name('index');
Route::get('/pegawai',[HomeController::class,'pegawai']);

//Routing Pasien
Route::get('login/pasien',[PasienController::class,'halaman_login'])->name('login.pasien');
Route::post('login/pasien',[PasienController::class,'login'])->name('login.pasien');
Route::get('/dashboard/pasien', [PasienController::class, 'index'])->name('dashboard.pasien')->middleware('dashboard_pasien');
Route::get('/dashboard/pasien/profile', [PasienController::class, 'profile'])->name('dashboard.pasien.profile')->middleware('dashboard_pasien');
Route::post('/dashboard/pasien/profile', [PasienController::class, 'update_profile'])->middleware('dashboard_pasien');
Route::get('/dashboard/pasien/daftar-dokter', [PasienController::class, 'daftar_dokter'])->middleware('dashboard_pasien');
Route::get('/dashboard/pasien/riwayat_pemeriksaan', [PasienController::class, 'riwayat_pemeriksaan'])->middleware('dashboard_pasien');
Route::get('/dashboard/pasien/daftar_laboran', [PasienController::class, 'daftar_laboran'])->name('dashboard.pasien.daftar_laboran')->middleware('dashboard_pasien');
Route::post('/dashboard/pasien/daftar_laboran', [PasienController::class, 'daftar_laboran_store'])->name('dashboard.pasien.daftar_laboran')->middleware('dashboard_pasien');

//Routing Dokter
Route::get('/login/dokter',[DokterController::class,'halaman_login'])->name('login.dokter');
Route::post('/login/dokter',[DokterController::class,'login'])->name('login.dokter');
Route::get('/dashboard/dokter',[DokterController::class,'dashboard'])->name('dashboard.dokter')->middleware('dashboard_dokter');
Route::get('/dashboard/dokter/input_pemeriksaan',[DokterController::class,'input_pemeriksaan'])->name('dashboard.dokter.input_pemeriksaan')->middleware('dashboard_dokter');
Route::post('/dashboard/dokter/input_pemeriksaan',[DokterController::class,'input_pemeriksaan_store'])->name('dashboard.dokter.input_pemeriksaan')->middleware('dashboard_dokter');
Route::get('/dashboard/dokter/daftarpasien',[DokterController::class,'index'])->name('dashboard.dokter.daftarpasien')->middleware('dashboard_dokter');
Route::get('/dashboard/dokter/pemeriksaan/{id}', [DokterController::class,'pemeriksaan'])->name('dashboard.dokter.pemeriksaan')->middleware('dashboard_dokter');
Route::post('/dashboard/dokter/pemeriksaan/{id}', [DokterController::class, 'update_pemeriksaan'])->name('dashboard.dokter.pemeriksaan')->middleware('dashboard_dokter');
Route::get('/dashboard/dokter/hasil_pemeriksaan',[DokterController::class,'hasil_pemeriksaan'])->name('dashboard.dokter.hasil_pemeriksaan')->middleware('dashboard_dokter');
Route::post('/dashboard/dokter/hasil_pemeriksaan',[DokterController::class,'hasil_pemeriksaan_store'])->name('dashboard.dokter.hasil_pemeriksaan')->middleware('dashboard_dokter');
Route::get('/dashboard/dokter/riwayat',[DokterController::class,'riwayat'])->name('dashboard.dokter.riwayat')->middleware('dashboard_dokter');

//Routing Laboran
Route::get('/login/laboran',[LaboranController::class,'halaman_login'])->name('login.laboran');
Route::post('/login/laboran',[LaboranController::class,'login'])->name('login.laboran');
Route::get('/dashboard/laboran',[LaboranController::class,'dashboard'])->name('dashboard.laboran')->middleware('dashboard_laboran');
Route::get('/dashboard/laboran/halaman_pemeriksaan',[LaboranController::class,'halaman_pemeriksaan'])->name('dashboard.laboran.halaman_pemeriksaan')->middleware('dashboard_laboran');
Route::get('/dashboard/laboran/pemeriksaan/{id}',[LaboranController::class,'pemeriksaan'])->name('dashboard.laboran.pemeriksaan')->middleware('dashboard_laboran');
Route::post('/dashboard/laboran/pemeriksaan/{id}',[LaboranController::class,'hasil_pemeriksaan_store'])->name('dashboard.laboran.pemeriksaan')->middleware('dashboard_laboran');
Route::get('/dashboard/laboran/riwayat',[LaboranController::class,'riwayat'])->name('dashboard.laboran.riwayat')->middleware('dashboard_laboran');
Route::get('/dashboard/laboran/riwayat_pemeriksaan',[LaboranController::class,'riwayat_pemeriksaan_pasien'])->name('dashboard.laboran.riwayat_pemeriksaan_pasien')->middleware('dashboard_laboran');
Route::get('/dashboard/laboran/stock_reagen',[LaboranController::class,'stock_reagen'])->name('dashboard.laboran.stock_reagen')->middleware('dashboard_laboran');
Route::post('/dashboard/laboran/stock_reagen',[LaboranController::class,'stock_reagen_store'])->name('dashboard.laboran.stock_reagen')->middleware('dashboard_laboran');
Route::get('/dashboard/laboran/data_stock',[LaboranController::class,'data_stock'])->name('dashboard.laboran.data_stock')->middleware('dashboard_laboran');
Route::get('/dashboard/laboran/kalibrasi_alat',[LaboranController::class,'kalibrasi_alat'])->name('dashboard.laboran.kalibrasi_alat')->middleware('dashboard_laboran');
Route::post('/dashboard/laboran/kalibrasi_alat',[LaboranController::class,'kalibrasi_alat_store'])->name('dashboard.laboran.kalibrasi_alat')->middleware('dashboard_laboran');
Route::get('/dashboard/laboran/data_kalibrasi_alat',[LaboranController::class,'data_kalibrasi_alat'])->name('dashboard.laboran.data_kalibrasi_alat')->middleware('dashboard_laboran');
Route::get('/dashboard/laboran/print/{id}', 'LaboranController@printHasilPemeriksaan')->name('dashboard.laboran.print');
Route::get('/dashboard/laboran/daftar_laboratorium',[LaboranController::class,'daftar_laboratorium'])->name('dashboard.laboran.daftar_laboratorium')->middleware('dashboard_laboran');
Route::post('/dashboard/laboran/daftar_laboratorium',[LaboranController::class,'daftar_laboratorium_store'])->name('dashboard.laboran.daftar_laboratorium')->middleware('dashboard_laboran');
Route::get('/laboran/pasien/{id}', [LaboranController::class, 'getPasienData'])->middleware('dashboard_laboran');
Route::get('/laboran/riwayat/{id}', [LaboranController::class, 'getRiwayatData'])->middleware('dashboard_laboran');




//Bagian Admin
Route::get('/login/admin',[AdminController::class,'halaman_login'])->name('login.admin');
Route::post('/login/admin',[AdminController::class,'login'])->name('login.admin');
Route::get('/dashboard/admin',[AdminController::class,'dashboard'])->name('dashboard.admin')->middleware('dashboard_admin');
Route::get('/dashboard/admin/pemeriksaan',[AdminController::class,'halaman_pemeriksaan'])->name('dashboard.admin.pemeriksaan')->middleware('dashboard_admin');
Route::post('/dashboard/admin/pemeriksaan',[AdminController::class,'pemeriksaan'])->name('dashboard.admin.pemeriksaan')->middleware('dashboard_admin');
Route::put('/dashboard/admin/pemeriksaan/{id}',[AdminController::class,'update_pemeriksaan'])->name('dashboard.admin.update_pemeriksaan')->middleware('dashboard_admin');
Route::get('/dashboard/admin/pemeriksaan/{id}/edit', [AdminController::class, 'edit_pemeriksaan'])->name('dashboard.admin.edit_pemeriksaan')->middleware('dashboard_admin');
// Route::put('/dashboard/admin/pemeriksaan/{id}', [AdminController::class, 'update_pemeriksaan'])->name('dashboard.admin.update_pemeriksaan')->middleware('dashboard_admin');
Route::delete('/dashboard/admin/pemeriksaan/{id}', [AdminController::class, 'delete_pemeriksaan'])->name('dashboard.admin.delete_pemeriksaan')->middleware('dashboard_admin');
Route::get('/dashboard/admin/rincian_pemeriksaan',[AdminController::class,'halaman_rincian_pemeriksaan'])->name('dashboard.admin.rincian_pemeriksaan')->middleware('dashboard_admin');
Route::post('/dashboard/admin/rincian_pemeriksaan',[AdminController::class,'rincian_pemeriksaan'])->name('dashboard.admin.rincian_pemeriksaan')->middleware('dashboard_admin');
Route::get('/dashboard/admin/rincian_pemeriksaan/{id}/edit', [AdminController::class, 'edit_pemeriksaan'])->name('dashboard.admin.edit_rincian_pemeriksaan')->middleware('dashboard_admin');
Route::put('/dashboard/admin/rincian_pemeriksaan/{id}', [AdminController::class, 'update_rincian_pemeriksaan'])->name('dashboard.admin.update_rincian_pemeriksaan')->middleware('dashboard_admin');
Route::delete('/dashboard/admin/rincian_pemeriksaan/{id}', [AdminController::class, 'delete_rincian_pemeriksaan'])->name('dashboard.admin.delete_rincian_pemeriksaan')->middleware('dashboard_admin');



Route::get('/logout',[AuthenticationController::class, 'logout']);




Route::get('/register/pasien', function () {
    return view('pasien.menu_pendaftaran_khusus-pasien');
});

Route::get('/register', function () {
    return view('register');
});


//Route buat Pasien
// Route::get('/login/pasien',[PasienController::class,'index']);
// Route::post('/login/pasien',[PasienController::class,'login'])->middleware('pasien_login')->name('login.pasien');


Route::post('register', [AuthenticationController::class, 'register'])->name('register');
// Route::post('login', [AuthenticationController::class, 'login'])->name('login');
// Route::post('dashboard', [AuthenticationController::class, 'dashboard'])->name('dashboard');