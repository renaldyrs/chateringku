<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\bank;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bank = [[
            'nama_bank'=>'BCA',
            'no_rekening'=>'12345678'

        ],
        [
            'nama_bank'=>'BRI',
            'no_rekening'=>'12345678'
            
        ]];
        bank::insert(
            $bank
        );
    }
}
