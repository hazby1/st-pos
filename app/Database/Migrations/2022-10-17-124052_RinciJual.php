<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RinciJual extends Migration
{
    public function up()
    {
        // Menambahkan field jual
        $this->forge->addField([
            'id_rinci' => [
                'type' => 'INT',
                'constraint' => '11',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'no_faktur' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'unique' => true
            ],
            'kode_produk' => [
                'type' => 'VARCHAR',
                'constraint' => '25'
            ],
            'harga_jual' => [
                'type' => 'INT',
                'constraint' => '11'
            ],
            'qty' => [
                'type' => 'INT',
                'constraint' => '11'
            ],
            'total_harga' => [
                'type' => 'INT',
                'constraint' => '11'
            ],
            'created_at DATETIME CURRENT_TIMESTAMP',
            'updated_at' => [
                'type' => 'DATETIME',
                'DEFAULT' => 'NULL'
            ]
        ]);

        // Membuah primary key
        $this->forge->addKey('id_rinci', true);

        // membuat tabel rinci jual
        $this->forge->createTable('t_rinci', true);
    }

    public function down()
    {
        // Menghapus tabel rinci jual
        $this->forge->dropTable('t_rinci');
    }
}
