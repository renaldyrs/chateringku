<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/adminhome', 'App\HTTP\Controllers\AdminController@index')->name('adminhome')->middleware(['role:admin','auth']);
Route::get('/adminpengadaan', 'App\HTTP\Controllers\PengadaanController@view')->middleware(['role:pengadaan','auth']);
Route::get('/admin_pegawai','App\HTTP\Controllers\AdminController@pegawai')->middleware(['role:admin','auth']);
Route::post('/admin_pegawai/tambah','App\HTTP\Controllers\AdminController@tambahpegawai')->middleware(['role:admin','auth']);
Route::get('/admin_pegawai/hapus/{id}','App\HTTP\Controllers\AdminController@hapuspegawai')->middleware(['role:admin','auth']);