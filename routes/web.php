<?php

use App\Http\Controllers\AuthManual;
use App\Http\Controllers\PengaduanAdmin;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});
Route::get('/admin', function () {return view('admin.index');})->name('admin.index');
Route::get('/cust', function () {return view('cust.index');})->name('cust.index');
Route::get('/petugas', function () {return view('petugas.index');})->name('petugas.index');

Route::resource('user', UserController::class);
Route::resource('role', RoleController::class);
Route::resource('pengaduan', PengaduanController::class);
Route::resource('pengaduanAdmin', PengaduanAdmin::class)->parameters([
    'pengaduanAdmin' => 'pengaduan'
]);

Route::get('/login', [AuthManual::class, 'login'])->name('login');
Route::post('/login', [AuthManual::class, 'loginProses'])->name('loginProses');
Route::post('/logout', [AuthManual::class, 'logout'])->name('logout');

Route::get('/register', [AuthManual::class, 'register'])->name('register');
Route::post('/register', [AuthManual::class, 'registerProses'])->name('registerProses');