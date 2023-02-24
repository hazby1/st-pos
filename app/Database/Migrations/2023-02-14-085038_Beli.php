<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Beli extends Migration
{
    public function up()
    {
        // Menambahkan field Beli
        $this->forge->addField([
            'id_beli' => [
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nota_beli' => [
                'type' => 'VARCHAR',
                'constraint' => '250'
            ],
            'tgl_beli' => [
                'type' => 'DATE'
            ],
            'grand_total' => [
                'type' => 'INT',
                'constraint' => '11'
            ],
            'id_kasir' => [
                'type' => 'INT',
                'constraint' => '11'
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME'
        ]);

        // Membuat primary key
        $this->forge->addKey('id_beli', true);

        // Membuat tabel beli
        $this->forge->createTable('t_beli', true);
    }

    public function down()
    {
        // Membuat tabel beli
        $this->forge->dropTable('t_beli');
    }
}
