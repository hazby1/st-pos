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
                'nama_user' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => 'd033e22ae348aeb5660fc2140aec35850c4da997',
                'level' => 'admin'
            ],
            [
                'nama_user' => 'Kasir',
                'email' => 'kasir@admin.com',
                'password' => 'd033e22ae348aeb5660fc2140aec35850c4da997',
                'level' => 'kasir'
            ],
            [
                'nama_user' => 'Teknisi',
                'email' => 'teknisi@admin.com',
                'password' => 'd033e22ae348aeb5660fc2140aec35850c4da997',
                'level' => 'teknisi'
            ],
        ];

        foreach ($user_data as $data) {
            // Insert semua data ke tabel
            $this->db->table('t_user')->insert($data);
        }
    }
}
