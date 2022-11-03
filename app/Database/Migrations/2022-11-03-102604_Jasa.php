<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jasa extends Migration
{
    public function up()
    {
        // Membuat tabel Jasa
        $this->forge->addField([
            'id_jasa' => [
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'kode_jasa' => [
                'type' => 'VARCHAR',
                'constraint' => '25'
            ],
            'nama_jasa' => [
                'type' => 'VARCHAR',
                'constraint' => '150'
            ],
            'id_kategori' => [
                'type' => 'INT',
                'constraint' => '2'
            ],
            'id_satuan' => [
                'type' => 'INT',
                'constraint' => '2',
            ],
            'harga_modal' => [
                'type' => 'INT',
                'constraint' => '11'
            ],
            'harga_jual' => [
                'type' => 'INT',
                'constraint' => '11'
            ],
            'stok' => [
                'type' => 'INT',
                'constraint' => '11'
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME'
        ]);

        // Membuat primary key
        $this->forge->addKey('id_jasa', true);
        // Membuat tabel Jasa
        $this->forge->createTable('t_jasa', true);
    }

    public function down()
    {
        // Menghapus tabel Jasa
        $this->forge->dropTable('t_jasa');
    }
}
