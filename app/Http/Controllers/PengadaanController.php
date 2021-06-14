<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use Illuminate\Http\Request;
use DB;
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
    public function tambahsuplier(Request $request){
        supplier::insert([
            'nama_suplier'=>$request->nama,
            'alamat'=>$request->alamat,
            'no_hp'=>$request->nohp
        ]);
        return redirect()->back();
    }
    public function editsuplier(Request $request){
        DB::table('suppliers')->where('id_suplier',$request->id_suplier)->update([
            'nama_suplier'=>$request->nama,
            'alamat'=>$request->alamat,
            'no_hp'=>$request->nohp
        ]);
        return redirect()->back();
    }
    public function hapussuplier($id){
        DB::table('suppliers')->where('id_suplier',$id)->delete();
        return redirect()->back();
    }
}
