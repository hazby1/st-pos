<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jual extends Migration
{
    public function up()
    {
        // Menambahkan field jual
        $this->forge->addField([
            'id_jual' => [
                'type' => 'INT',
                'constraint' => '11',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'No_faktur' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
                'unique' => true
            ],
            'tgl_jual' => [
                'type' => 'DATE',
                'constraint' => '25'
            ],
            'jam' => [
                'type' => 'TIME',
                'constraint' => '15'
            ],
            'grand_total' => [
                'type' => 'INT',
                'constraint' => '11',
            ],
            'dibayar' => [
                'type' => 'INT',
                'constraint' => '11',
            ],
            'kembalian' => [
                'type' => 'INT',
                'constraint' => '11',
            ],
            'id_kasir' => [
                'type' => 'INT',
                'constraint' => '11',
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

        // Membuah primary key
        $this->forge->addKey('id_jual', true);

        // membuat tabel jual
        $this->forge->createTable('t_jual', true);
    }

    public function down()
    {
        // menghapus tabel jual
        $this->forge->dropTable('t_jual');
    }
}
