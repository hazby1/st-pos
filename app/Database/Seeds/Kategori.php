<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Kategori extends Seeder
{
    public function run()
    {
        // Membuat data
        $satuan_data = [
            ['nama_satuan' => 'Laptop'],
            ['nama_satuan' => 'PC'],
            ['nama_satuan' => 'Router'],
            ['nama_satuan' => 'Printer'],
            ['nama_satuan' => 'RAM'],
            ['nama_satuan' => 'SSD'],
            ['nama_satuan' => 'HDD']
        ];

        foreach ($satuan_data as $data) {
            // Insert semua data ke tabel
            $this->db->table('t_kategori')->insert($data);
        }
    }
}
