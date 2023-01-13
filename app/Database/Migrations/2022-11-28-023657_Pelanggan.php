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
                'constraint' => '2',
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
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME',
        ]);

        // Menambah Primery Key
        $this->forge->addKey('id_pelanggan', true);

        // Menambah tabel Pelanggan
        $this->forge->createTable('t_pelanggan', true);
    }

    public function down()
    {
        // Menghapus tabel pelanggan
        $this->forge->dropTable('t_pelanggan');
    }
}
