<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use Illuminate\Http\Request;

class PengadaanController extends Controller
{
    public function view(){
        return view('/admin_pengadaan');
        // dd("a");
    }
    public function suplier(){
        $suplier = supplier::get();
        return view('/pengadaan_supplier',['suplier'=>$suplier]);
    }
}
