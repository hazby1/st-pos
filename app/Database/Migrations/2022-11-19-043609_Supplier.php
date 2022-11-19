<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Supplier extends Migration
{
    public function up()
    {
        // Menambahkan field Supplier
        $this->forge->addField([
            'id_supplier' => [
                'type' => 'INT',
                'constraint' => '2',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nama_supplier' => [
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

        // Menambah Primry Key
        $this->forge->addKey('id_supplier', true);

        // Menambah tabel Supplier
        $this->forge->createTable('t_supplier', true);
    }

    public function down()
    {
        // Menghapus tabel supplier
        $this->forge->dropTable('t_supplier');
    }
}
