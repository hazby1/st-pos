<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        // Membuat data
        $user_data = [
            [
                'nama_user' => 'Admn',
                'email' => 'admin@admin.com',
                'password' => '21232f297a57a5a743894a0e4a801fc3',
                'level' => 'admin'
            ],
            [
                'nama_user' => 'Kasir',
                'email' => 'kasir@admin.com',
                'password' => '21232f297a57a5a743894a0e4a801fc3',
                'level' => 'kasir'
            ],
            [
                'nama_user' => 'Teknisi',
                'email' => 'teknisi@admin.com',
                'password' => '21232f297a57a5a743894a0e4a801fc3',
                'level' => 'teknisi'
            ],
        ];

        foreach ($user_data as $data) {
            // Insert semua data ke tabel
            $this->db->table('t_user')->insert($data);
        }
    }
}
