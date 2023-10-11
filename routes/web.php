<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SesiController;
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
    Route::get('/login', [SesiController::class,'index']);
    Route::post('/login', [SesiController::class,'login']);
    Route::get('/', [HomeController::class,'index']);
    Route::get('/', [HomeController::class, 'search'])->name('search');
});

Route::middleware(['auth'])->group(function () {
    // Route::get('/admin', [AdminController::class,'index']);
    // Route::get('/guru', [GuruController::class,'index']);
    Route::get('/logout',[SesiController::class,'logout']);
    Route::group(['middleware' => ['cekUser:admin']], function () {
        Route::resource('/admin', AdminController::class);
        });
    Route::group(['middleware' => ['cekUser:gurubk']], function () {
        Route::resource('/guru', GuruController::class);
        });
});
