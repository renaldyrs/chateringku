<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use File;
class AdminController extends Controller
{
    public function index(){
        return view('/adminhome');
    }
    public function pegawai(){
        $pegawai = pegawai::get();
        return view('admin_pegawai',['pegawai'=>$pegawai]);
    }
    public function tambahpegawai(Request $request){
        $nama = $request->depan ." ". $request->belakang;
        $file = $request->file('file');
        $nama_file = $nama.".".$file->getClientOriginalExtension();
        $tujuan_upload = 'data_file/pegawai';
        $file->move($tujuan_upload,$nama_file);
        // dd($nama);
        pegawai::insert([
            'nama_pegawai'=>$nama,
            'alamat'=>$request->alamat,
            'foto'=>$nama_file,
            'no_hp'=>$request->no_hp
        ]);
        return redirect()->back();
    }  
    public function hapuspegawai($id){

        $pegawai = pegawai::find($id);
        File::delete('data_file/pegawai/'.$pegawai->foto);
        $pegawai->delete();
        return redirect()->back();
        // $pegawai = pegawai::where('id_pegawai' ,$id )->get();
        // dd($pegawai);
    }    
}
