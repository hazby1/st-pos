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
            'no_faktur' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
            ],
            'tgl_jual' => [
                'type' => 'DATE'
            ],
            'jam' => [
                'type' => 'TIME'
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
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME'
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
