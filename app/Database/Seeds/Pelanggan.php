<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Pelanggan extends Seeder
{
    public function run()
    {
        // Membuat data seeder pelanggan
        $pelanggan_data = [
            [
                'nama_pelanggan' => 'Xpert',
                'alamat' => 'Jakarta',
                'no_hp' => '085229915459',
            ],
            [
                'nama_pelanggan' => 'Hasbi',
                'alamat' => 'Tegal',
                'no_hp' => '085229915459',
            ],
            [
                'nama_pelanggan' => 'Part',
                'alamat' => 'Brebes',
                'no_hp' => '085229915459',
            ],
        ];

        foreach ($pelanggan_data as $data) {
            # Insert ke tabel
            $this->db->table('t_pelanggan')->insert($data);
        }
    }
}
