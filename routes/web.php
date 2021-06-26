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

Route::get('/', "App\HTTP\Controllers\PelangganController@index");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');



// pelanggan
Route::post('/add-to-cart', 'App\HTTP\Controllers\PelangganController@add')->name('add')->middleware(['auth']);
Route::get('/keranjang', 'App\HTTP\Controllers\PelangganController@keranjang')->name('keranjang')->middleware(['auth']);


// admin

Route::get('/adminhome', 'App\HTTP\Controllers\AdminController@index')->name('adminhome')->middleware(['role:admin','auth']);
Route::get('/admin_pegawai','App\HTTP\Controllers\AdminController@pegawai')->middleware(['role:admin','auth']);
Route::post('/admin_pegawai/edit','App\HTTP\Controllers\AdminController@editpegawai')->name('editpegawai')->middleware(['role:admin','auth']);
Route::post('/admin_pegawai/tambah','App\HTTP\Controllers\AdminController@tambahpegawai')->middleware(['role:admin','auth']);
Route::get('/admin_pegawai/hapus/{id}','App\HTTP\Controllers\AdminController@hapuspegawai')->middleware(['role:admin','auth']);
Route::get('/admin_produk', 'App\HTTP\Controllers\AdminController@produk')->middleware(['role:admin','auth']);
Route::post('/admin_produk/tambah', 'App\HTTP\Controllers\AdminController@tambahproduk')->middleware(['role:admin','auth']);
Route::post('/admin_produk/edit', 'App\HTTP\Controllers\AdminController@editproduk')->middleware(['role:admin','auth']);
Route::get('/admin_produk/hapus/{id}', 'App\HTTP\Controllers\AdminController@hapusproduk')->middleware(['role:admin','auth']);




// pengadaaan

Route::get('/adminpengadaan', 'App\HTTP\Controllers\PengadaanController@view')->middleware(['role:pengadaan','auth']);
Route::get('/pengadaan_supplier', 'App\HTTP\Controllers\PengadaanController@suplier')->middleware(['role:pengadaan','auth']);
Route::post('/pengadaan_supplier/tambah', 'App\HTTP\Controllers\PengadaanController@tambahsuplier')->middleware(['role:pengadaan','auth']);
Route::post('/pengadaan_supplier/edit', 'App\HTTP\Controllers\PengadaanController@editsuplier')->middleware(['role:pengadaan','auth']);
Route::get('/pengadaan_supplier/hapus/{id}', 'App\HTTP\Controllers\PengadaanController@hapussuplier')->middleware(['role:pengadaan','auth']);


Route::get('/produk-detail', function () {
    return view('produk-detail');
});
Route::get('/checkout', function () {
    return view('checkout');
});
Route::get('/pembayaran', function () {
    return view('pembayaran');
});
Route::get('/pesanan', function () {
    return view('pesanan');
});
Route::get('/admin-diproses', function () {
    return view('admin-diproses');
});
