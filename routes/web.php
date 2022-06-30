<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
     return view('auth.login');
});

Auth::routes();

// Karyawan Controller
Route::get('home', [KaryawanController::class, 'index'])->name('home');
Route::get('profile', [KaryawanController::class, 'profile'])->name('profile');
Route::get('link', [KaryawanController::class, 'linkuStarto']);
Route::post('updateProfile', [KaryawanController::class, 'updateProfile']);
Route::get('edit/{id}', [KaryawanController::class, 'edit']);
Route::post('absensi/{id}', [KaryawanController::class, 'absensi']);
// End Karyawan Controller

// Admin Controller
Route::get('admin/home', [AdminController::class, 'index'])->name('admin.home')->middleware('is_admin');
Route::get('admin/karyawan', [AdminController::class, 'indexK'])->name('admin.karyawan');
Route::get('admin/absensi', [AdminController::class, 'index']);
Route::get('admin/createU', [AdminController::class, 'createU']);
Route::post('admin/createA', [AdminController::class, 'createA']);
Route::post('admin/storeU', [AdminController::class, 'storeU']);
Route::post('admin/storeA', [AdminController::class, 'storeA']);
Route::get('admin/profil', [AdminController::class, 'profile']);
Route::get('admin/editA/{id}', [AdminController::class, 'editA']);
Route::get('admin/editU/{id}', [AdminController::class, 'editU']);
Route::put('admin/updateU/{id}', [AdminController::class, 'updateU']);
Route::put('admin/updateA/{id}', [AdminController::class, 'updateA']);
Route::post('admin/destroyU/{email}', [AdminController::class, 'destroyU']);
Route::post('admin/destroyA/{id}', [AdminController::class, 'destroyA']);
Route::get('admin/cetak/{id}', [AdminController::class, 'cetakAbsen'])->name('admin.cetakLaporan');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
