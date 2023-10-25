<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\TanggapanController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [SesiController::class,'index']);
// Route::post('/', [SesiController::class,'login']);
// Route::get('/logout',[SesiController::class,'logout']);

// Route::get('/admin', [AdminController::class,'index']);
// Route::get('/guru', [GuruController::class,'index']);

Route::middleware(['guest'])->group(function(){
    Route::get('/login', [SesiController::class,'index'])->name('login');
    Route::post('/login', [SesiController::class,'login']);
    Route::get('/', [HomeController::class,'index']);
    Route::get('/', [HomeController::class, 'search'])->name('search');
});

Route::middleware(['auth'])->group(function () {
    // Route::get('/admin', [AdminController::class,'index']);
    // Route::get('/guru', [GuruController::class,'index']);
    Route::get('/logout',[SesiController::class,'logout']);
    Route::group(['middleware' => ['cekUser:admin']], function () {
        Route::get('/admin', [AdminController::class,'index']);
        Route::resource('/admin/siswa',SiswaController::class);
        Route::resource('/admin/petugas',PetugasController::class);
        Route::resource('/admin/pelanggaran',PelanggaranController::class);
        Route::resource('/admin/tanggapan',TanggapanController::class);

        Route::delete('/admin/petugas/{id}',[PetugasController::class,'destroy']);
        Route::get('/admin/petugas/{id}',[PetugasController::class,'edit']);
        Route::put('/admin/petugas/{id}',[PetugasController::class,'update']);
        });
    Route::group(['middleware' => ['cekUser:gurubk']], function () {
        Route::get('/guru', [GuruController::class,'index']);
        Route::resource('/guru/siswa',SiswaController::class);
        Route::resource('/guru/petugas',PetugasController::class);
        Route::resource('/guru/pelanggaran',PelanggaranController::class);
        Route::resource('/guru/tanggapan',TanggapanController::class);

        Route::get('/guru/siswa', [SiswaController::class, 'search'])->name('search');
        });
});
