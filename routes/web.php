<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KewajibanInvestasiController;
use App\Http\Controllers\KomisarisUtamaController;
use App\Http\Controllers\ModalDasarController;
use App\Http\Controllers\ProsesController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SahamController;
use App\Http\Controllers\SesiController;
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

Route::middleware(['guest'])->group(function() {
    Route::get('/', [SesiController::class, 'login'])->name('login');
    Route::post('/', [SesiController::class, 'loginPost'])->name('login.post');
    Route::get('/register', [SesiController::class, 'register'])->name('register');
    Route::post('/register', [SesiController::class, 'registerPost'])->name('register.post');
});

Route::middleware(['auth'])->group(function() {
    Route::post('/logout', [SesiController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'userAkses:komisaris_utama,admin'])->group(function () {
    // Routes yang hanya bisa diakses oleh komisaris_utama dan admin
    Route::resource('saham', SahamController::class);
});

Route::middleware(['auth', 'userAkses:admin'])->group(function() {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::resource('modaldasar', ModalDasarController::class);
    Route::resource('kewajibaninvestasi', KewajibanInvestasiController::class);
    Route::get('/admin-kelola-user', [AdminController::class, 'adminuser'])->name('admin.user');
    Route::resource('user', UserController::class);
});

Route::middleware(['auth', 'userAkses:pemegang_saham'])->group(function() {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'userAkses:komisaris_utama'])->group(function() {
    Route::get('/dashboard-komisaris-utama', [KomisarisUtamaController::class, 'index'])->name('dashboard.komisarisutama');
});