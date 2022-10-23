<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Setting extends Seeder
{
    public function run()
    {
        // Membuat data
        $satuan_data = [
            [
                'nama_toko' => 'SENTRAL TEK',
                'slogan' => 'Sparepart dan Servis',
                'alamat' => 'Jalan Raya 2 Pagongan No. 60 Dukuhturi',
                'no_telepon' => '0857 4236 4222',
                'deskripsi' => '',
            ],
        ];

        foreach ($satuan_data as $data) {
            // Insert semua data ke tabel
            $this->db->table('t_setting')->insert($data);
        }
    }
}
