<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Supplier extends Seeder
{
    public function run()
    {
        // Membuat data seeder supplier
        $supplier_data = [
            [
                'nama_supplier' => 'Xpert Notebook',
                'alamat' => 'Jakarta',
                'no_hp' => '085229915459',
            ],
            [
                'nama_supplier' => 'Hasbi Part',
                'alamat' => 'Tegal',
                'no_hp' => '085229915459',
            ],
            [
                'nama_supplier' => 'Part Notebook',
                'alamat' => 'Brebes',
                'no_hp' => '085229915459',
            ],
        ];

        foreach ($supplier_data as $data) {
            # Insert ke tabel
            $this->db->table('t_supplier')->insert($data);
        }
    }
}
