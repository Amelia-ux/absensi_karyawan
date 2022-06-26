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
    return view('admin.home', [
        'title' => 'Dashboard Admin'
    ]);
});

Auth::routes();

Route::get('/home', [KaryawanController::class, 'index'])->name('home');

Route::get('admin/home', [AdminController::class, 'index'])->name('admin.home')->middleware('is_admin');

Route::get('/main', function() {
    return view('admin.home');
});
