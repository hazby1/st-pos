<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Produk extends Seeder
{
    public function run()
    {
        // Membuat data
        $produk_data = [
            [
                'kode_produk' => '111',
                'nama_produk' => 'Asus X455',
                'id_kategori' => '1',
                'id_satuan' => '1',
                'harga_beli' => '4500000',
                'harga_jual' => '5100000',
                'harga_jual_a' => '4800000',
                'harga_jual_b' => '4950000',
                'stok' => '100',
            ],
            [
                'kode_produk' => '222',
                'nama_produk' => 'Lenovo X455',
                'id_kategori' => '1',
                'id_satuan' => '1',
                'harga_beli' => '3500000',
                'harga_jual' => '5200000',
                'harga_jual_a' => '4800000',
                'harga_jual_b' => '4950000',
                'stok' => '100',
            ],
            [
                'kode_produk' => '333',
                'nama_produk' => 'Dell X455',
                'id_kategori' => '1',
                'id_satuan' => '1',
                'harga_beli' => '4500000',
                'harga_jual' => '5100000',
                'harga_jual_a' => '4800000',
                'harga_jual_b' => '4950000',
                'stok' => '100',
            ],
            [
                'kode_produk' => '444',
                'nama_produk' => 'HP X455',
                'id_kategori' => '3',
                'id_satuan' => '3',
                'harga_beli' => '4500000',
                'harga_jual' => '5100000',
                'harga_jual_a' => '4800000',
                'harga_jual_b' => '4950000',
                'stok' => '100',
            ],
            [
                'kode_produk' => '555',
                'nama_produk' => 'Canon X455',
                'id_kategori' => '1',
                'id_satuan' => '2',
                'harga_beli' => '4500000',
                'harga_jual' => '5100000',
                'harga_jual_a' => '4800000',
                'harga_jual_b' => '4950000',
                'stok' => '100',
            ],
            [
                'kode_produk' => '555',
                'nama_produk' => 'Brother X455',
                'id_kategori' => '2',
                'id_satuan' => '1',
                'harga_beli' => '2500000',
                'harga_jual' => '3100000',
                'harga_jual_a' => '2800000',
                'harga_jual_b' => '2950000',
                'stok' => '100',
            ],
            [
                'kode_produk' => '666',
                'nama_produk' => 'Asus X455',
                'id_kategori' => '1',
                'id_satuan' => '1',
                'harga_beli' => '4500000',
                'harga_jual' => '5100000',
                'harga_jual_a' => '4800000',
                'harga_jual_b' => '4950000',
                'stok' => '100',
            ],
            [
                'kode_produk' => '777',
                'nama_produk' => 'Asus X455',
                'id_kategori' => '1',
                'id_satuan' => '1',
                'harga_beli' => '4500000',
                'harga_jual' => '5100000',
                'harga_jual_a' => '4800000',
                'harga_jual_b' => '4950000',
                'stok' => '100',
            ],
            [
                'kode_produk' => '888',
                'nama_produk' => 'Asus X455',
                'id_kategori' => '1',
                'id_satuan' => '1',
                'harga_beli' => '4500000',
                'harga_jual' => '5100000',
                'harga_jual_a' => '4800000',
                'harga_jual_b' => '4950000',
                'stok' => '100',
            ],
            [
                'kode_produk' => '999',
                'nama_produk' => 'Asus X455',
                'id_kategori' => '1',
                'id_satuan' => '1',
                'harga_beli' => '4500000',
                'harga_jual' => '5100000',
                'harga_jual_a' => '4800000',
                'harga_jual_b' => '4950000',
                'stok' => '100',
            ],
            [
                'kode_produk' => '110',
                'nama_produk' => 'Asus X455',
                'id_kategori' => '1',
                'id_satuan' => '1',
                'harga_beli' => '4500000',
                'harga_jual' => '5100000',
                'harga_jual_a' => '4800000',
                'harga_jual_b' => '4950000',
                'stok' => '100',
            ],
        ];

        foreach ($produk_data as $data) {
            // Insert semua data ke tabel
            $this->db->table('t_produk')->insert($data);
        }
    }
}
