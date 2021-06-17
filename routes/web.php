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

Route::get('/admin_pegawai', function () {
    return view('admin_pegawai');
});
Route::get('/admin_produk', function () {
    return view('admin_produk');
});
Route::get('/pengadaan_supplier', function () {
    return view('pengadaan_supplier');
});
Route::get('/keranjang', function () {
    return view('keranjang');
});
Route::get('/produk-detail', function () {
    return view('produk-detail');
});
Route::get('/checkout', function () {
    return view('checkout');
});
Route::get('/pembayaran', function () {
    return view('pembayaran');
});