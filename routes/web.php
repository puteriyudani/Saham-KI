<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KewajibanInvestasiController;
use App\Http\Controllers\ProsesController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SahamController;
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

Route::middleware(['guest'])->group(function() {
    Route::get('/', [SesiController::class, 'login'])->name('login');
    Route::post('/', [SesiController::class, 'loginPost'])->name('login.post');
    Route::get('/register', [SesiController::class, 'register'])->name('register');
    Route::post('/register', [SesiController::class, 'registerPost'])->name('register.post');
});

// Route::get('/home', function() {
//     return redirect('/admin');
// });

Route::middleware(['auth'])->group(function() {
    Route::post('/logout', [SesiController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'userAkses:admin'])->group(function() {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::resource('kewajiban-investasi', KewajibanInvestasiController::class);
});

Route::middleware(['auth', 'userAkses:pemegang_saham'])->group(function() {
    Route::get('/pemegang-saham', [AdminController::class, 'pemegang_saham']);
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::resource('saham', SahamController::class);
});