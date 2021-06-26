<?php

namespace Database\Seeders;

use App\Models\produk;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        produk::insert([
            'nama_produk'=>'ayam',
            'harga'=>222,
            'file'=>'ayam.jpg',
            'deskripsi'=>'asda',
            'kategori'=>'makan berat',
        ]);
    }
}
