<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Kategori extends Seeder
{
    public function run()
    {
        // Membuat data
        $satuan_data = [
            ['nama_kategori' => 'Laptop'],
            ['nama_kategori' => 'PC'],
            ['nama_kategori' => 'Router'],
            ['nama_kategori' => 'Printer'],
            ['nama_kategori' => 'RAM'],
            ['nama_kategori' => 'SSD'],
            ['nama_kategori' => 'HDD']
        ];

        foreach ($satuan_data as $data) {
            // Insert semua data ke tabel
            $this->db->table('t_kategori')->insert($data);
        }
    }
}
