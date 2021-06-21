<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $table = "produks";
    protected $fillable = ['id_produk','file','nama_produk','kategori','deskripsi'];
    protected $primaryKey = 'id_produk';
}
