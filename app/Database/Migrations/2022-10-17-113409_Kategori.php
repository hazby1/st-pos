<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kategori extends Migration
{
    public function up()
    {
        // Menambahkan kolom kategori
        $this->forge->addField([
            'id_kategori' => [
                'type' => 'INT',
                'constraint' => '2',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nama_kategori' => [
                'type' => 'VARCHAR',
                'constraint' => '250'
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME'
        ]);

        // Membuat primary key
        $this->forge->addKey('id_kategori', true);

        // Membuat tabel kategori
        $this->forge->createTable('t_kategori', true);
    }

    public function down()
    {
        // Menghapus tabel kategori
        $this->forge->dropTable('t_kategori');
    }
}
