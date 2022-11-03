<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Jasa extends Seeder
{
    public function run()
    {
        // Membuat data
        $jasa_data = [
            [
                'kode_jasa' => '111',
                'nama_jasa' => 'Servis Layar',
                'id_kategori' => '1',
                'id_satuan' => '1',
                'harga_modal' => '4500000',
                'harga_jual' => '5100000',
                'stok' => '100',
            ],
            [
                'kode_jasa' => '222',
                'nama_jasa' => 'Servis Mesin',
                'id_kategori' => '1',
                'id_satuan' => '1',
                'harga_modal' => '3500000',
                'harga_jual' => '5200000',
                'stok' => '100',
            ],
            [
                'kode_jasa' => '333',
                'nama_jasa' => 'Ganti Battery',
                'id_kategori' => '1',
                'id_satuan' => '1',
                'harga_modal' => '4500000',
                'harga_jual' => '5100000',
                'stok' => '100',
            ],
            [
                'kode_jasa' => '444',
                'nama_jasa' => 'Ganti Mesin',
                'id_kategori' => '3',
                'id_satuan' => '3',
                'harga_modal' => '4500000',
                'harga_jual' => '5100000',
                'stok' => '100',
            ],
            [
                'kode_jasa' => '555',
                'nama_jasa' => 'Ganti keyboard',
                'id_kategori' => '1',
                'id_satuan' => '2',
                'harga_modal' => '4500000',
                'harga_jual' => '5100000',
                'stok' => '100',
            ],
            [
                'kode_jasa' => '555',
                'nama_jasa' => 'Ganti Touchpad',
                'id_kategori' => '2',
                'id_satuan' => '1',
                'harga_modal' => '2500000',
                'harga_jual' => '3100000',
                'stok' => '100',
            ],
            [
                'kode_jasa' => '666',
                'nama_jasa' => 'Gati Casing',
                'id_kategori' => '1',
                'id_satuan' => '1',
                'harga_modal' => '4500000',
                'harga_jual' => '5100000',
                'stok' => '100',
            ],
            [
                'kode_jasa' => '777',
                'nama_jasa' => 'Bersihkan Kipas',
                'id_kategori' => '1',
                'id_satuan' => '1',
                'harga_modal' => '4500000',
                'harga_jual' => '5100000',
                'stok' => '100',
            ],
            [
                'kode_jasa' => '888',
                'nama_jasa' => 'Servis Charger',
                'id_kategori' => '1',
                'id_satuan' => '1',
                'harga_modal' => '4500000',
                'harga_jual' => '5100000',
                'stok' => '100',
            ],
            [
                'kode_jasa' => '999',
                'nama_jasa' => 'Servis Printer',
                'id_kategori' => '1',
                'id_satuan' => '1',
                'harga_modal' => '4500000',
                'harga_jual' => '5100000',
                'stok' => '100',
            ],
            [
                'kode_jasa' => '110',
                'nama_jasa' => 'Servis Monitor',
                'id_kategori' => '1',
                'id_satuan' => '1',
                'harga_modal' => '4500000',
                'harga_jual' => '5100000',
                'stok' => '100',
            ],
        ];

        foreach ($jasa_data as $data) {
            // Insert semua data ke tabel
            $this->db->table('t_jasa')->insert($data);
        }
    }
}
