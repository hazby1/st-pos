<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Satuan extends Seeder
{
    public function run()
    {
        // Membuat data
        $satuan_data = [
            ['nama_satuan' => 'Pcs'],
            ['nama_satuan' => 'Buah'],
            ['nama_satuan' => 'KG'],
            ['nama_satuan' => 'Unit'],
            ['nama_satuan' => 'Box'],
            ['nama_satuan' => 'Lusin'],
            ['nama_satuan' => 'Bungkus']
        ];
    }
}
