<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use File;
use DB;
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
        $file = $request->file('file');
        $nama_file = $request->nama.".".$file->getClientOriginalExtension();
        $tujuan_upload = 'data_file/pegawai';
        $file->move($tujuan_upload,$nama_file);
        // dd($nama);
        pegawai::insert([
            'nama_pegawai'=>$request->nama,
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
    public function editpegawai(Request $request){
        
        $pegawai = pegawai::find($request->id_pegawai);
        File::delete('data_file/pegawai/'.$pegawai->foto);
        // dd( $request->nama);
        $file = $request->file('file');
        $nama_file = $request->nama.".".$file->getClientOriginalExtension();
        $tujuan_upload = 'data_file/pegawai';
        $file->move($tujuan_upload,$nama_file);
        
        DB::table('pegawais')->where('id_pegawai', $request->id_pegawai)->update([
            'nama_pegawai'=>$request->nama,
            'alamat'=>$request->alamat,
            'foto'=>$nama_file,
            'no_hp'=>$request->no_hp
        ]);
        
        return redirect()->back();
    }  
}
