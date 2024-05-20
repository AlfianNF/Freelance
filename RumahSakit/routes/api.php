<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\LaboranController;
use App\Http\Controllers\AuthenticationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['auth:sanctum'])->group(function (){
    Route::get('/login',[AuthenticationController::class,'me']);
    Route::get('/logout',[AuthenticationController::class,'logout']);

    //Bagian Pasien
    Route::get('dashboard/profile',[PasienController::class,'profile']);

    //Bagian Dokter
    Route::get('dashboard/daftar_pasien',[DokterController::class,'index'])->middleware('dashboard_dokter');
    Route::get('dashboard/permintaan_pemeriksaan/{id}',[DokterController::class,'show'])->middleware('dashboard_dokter');
    Route::get('dashboard/pemeriksaan/{id}',[DokterController::class,'pemeriksaan'])->middleware('dashboard_dokter');
    Route::post('dashboard/pemeriksaan',[DokterController::class,'store'])->middleware('dashboard_dokter');
    Route::put('dashboard/pemeriksaan/{id}',[DokterController::class,'update'])->middleware('dashboard_dokter');
    
    //Bagian Laboran
    Route::get('dashboard/laboran/pemeriksaan/{id}',[LaboranController::class,'pemeriksaan'])->middleware('dashboard_laboran');
    Route::post('dashboard/riwayat',[LaboranController::class,'riwayat'])->middleware('dashboard_laboran');
    Route::get('dashboard/riwayat',[LaboranController::class,'riwayat_pemeriksaan'])->middleware('dashboard_laboran');
    Route::post('dashboard/kalibrasi_alat',[LaboranController::class,'kalibrasi_alat_store'])->middleware('dashboard_laboran');
    Route::get('dashboard/kalibrasi_alat',[LaboranController::class,'kalibrasi_alat'])->middleware('dashboard_laboran');


});

Route::post('/login',[AuthenticationController::class, 'login']);
Route::post('/register',[AuthenticationController::class, 'register']);

//Route Login berdasaran role 
Route::post('/login/admin', [AdminController::class, 'login'])->middleware('admin_login');
Route::post('/login/pasien', [PasienController::class, 'login'])->middleware('pasien_login');
Route::post('/login/dokter', [DokterController::class, 'login'])->middleware('dokter_login');
Route::post('/login/laboran', [LaboranController::class, 'login'])->middleware('laboran_login');