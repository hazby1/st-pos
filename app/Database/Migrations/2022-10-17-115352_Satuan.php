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
                'constraint' => '11',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nama_satuan' => [
                'type' => 'VARCHAR',
                'constraint' => '250'
            ],
            'hapus' => [
                'type' => 'ENUM',
                'constraint' => ['tidak', 'hapus'],
                'default' => 'tidak'
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME'
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
