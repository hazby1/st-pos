<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        // Menambahkan field user
        $this->forge->addField([
            'id_user' => [
                'type' => 'INT',
                'constraint' => '2',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nama_user' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
                'unique' => true
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '250'
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '250'
            ],
            'level' => [
                'type' => 'ENUM',
                'constraint' => ['admin', 'kasir', 'teknisi']
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME'
        ]);

        // Membuah primary key
        $this->forge->addKey('id_user', true);

        // membuat tabel user
        $this->forge->createTable('t_user', true);
    }

    public function down()
    {
        // menghapus tabel user
        $this->forge->dropTable('t_user');
    }
}
