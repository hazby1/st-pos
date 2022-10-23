<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Setting extends Migration
{
    public function up()
    {
        // Menambahkan kolom setting
        $this->forge->addField([
            'id_setting' => [
                'type' => 'INT',
                'constraint' => '2',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nama_toko' => [
                'type' => 'VARCHAR',
                'constraint' => '250'
            ],
            'slogan' => [
                'type' => 'VARCHAR',
                'constraint' => '250'
            ],
            'alamat' => [
                'type' => 'TEXT',
                'constraint' => '250'
            ],
            'no_telepon' => [
                'type' => 'VARCHAR',
                'constraint' => '15'
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'constraint' => '250'
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME'
        ]);

        // Membuat primary key
        $this->forge->addKey('id_setting', true);

        // Membuat tabel setting
        $this->forge->createTable('t_setting', true);
    }

    public function down()
    {
        // Menghapus tabel setting
        $this->forge->dropTable('t_setting');
    }
}
