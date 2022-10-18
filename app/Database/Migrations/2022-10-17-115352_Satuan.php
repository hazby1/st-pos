<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Satuan extends Migration
{
    public function up()
    {
        // Menambahkan field satuan
        $this->forge->addField([
            'id_satuan' => [
                'type' => 'INT',
                'constraint' => '2',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nama_satuan' => [
                'type' => 'VARCHAR',
                'constraint' => '250'
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'DEFAULT' => 'CURRENT_TIMESTAMP'
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'DEFAULT' => 'NULL'
            ]
        ]);

        // Membuat primary key
        $this->forge->addKey('id_satuan', true);

        // Membuat tabel satuan
        $this->forge->createTable('t_satuan', true);
    }

    public function down()
    {
        // Menghapus tabel satuan
        $this->forge->dropTable('t_satuan');
    }
}
