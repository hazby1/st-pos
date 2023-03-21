<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pelanggan extends Migration
{
    public function up()
    {
        // Menambahkan field Pelanggan
        $this->forge->addField([
            'id_pelanggan' => [
                'type' => 'INT',
                'constraint' => '11',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nama_pelanggan' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
                'unique' => true
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => '250'
            ],
            'no_hp' => [
                'type' => 'VARCHAR',
                'constraint' => '15'
            ],
            'level' => [
                'type' => 'ENUM',
                'constraint' => ['user', 'a', 'b'],
                'default' => 'user'
            ],
            'hapus' => [
                'type' => 'ENUM',
                'constraint' => ['tidak', 'hapus'],
                'default' => 'tidak'
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME',
        ]);

        // Menambah Primry Key
        $this->forge->addKey('id_pelanggan', true);

        // Menambah tabel Pelanggan
        $this->forge->createTable('t_pelanggan', true);
    }

    public function down()
    {
        // Menghapus tabel supplier
        $this->forge->dropTable('t_pelanggan');
    }
}
