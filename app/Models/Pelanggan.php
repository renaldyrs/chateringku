<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    
    protected $table = "pelanggans";
    protected $fillable = ['id_pelanggan','nama_pelanggan','alamat','no_hp','kode_pos','tanggal_lahir'];
    protected $primaryKey = 'id_pelanggan';
}
