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
                'nama_toko' => 'Nama Toko',
                'slogan' => 'Tagline',
                'alamat' => 'Alamat',
                'no_telepon' => 'No HP',
                'deskripsi' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            ],
        ];

        foreach ($satuan_data as $data) {
            // Insert semua data ke tabel
            $this->db->table('t_setting')->insert($data);
        }
    }
}
