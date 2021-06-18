<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index(){
        $produk = produk::get();
        return view('welcome', ['produk'=>$produk]);
    }
}
