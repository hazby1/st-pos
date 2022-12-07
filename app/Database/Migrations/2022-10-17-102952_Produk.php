<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produk extends Migration
{
    public function up()
    {
        // Membuat tabel Produk
        $this->forge->addField([
            'id_produk' => [
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'kode_produk' => [
                'type' => 'VARCHAR',
                'constraint' => '25'
            ],
            'nama_produk' => [
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
            'harga_beli' => [
                'type' => 'INT',
                'constraint' => '11'
            ],
            'harga_jual' => [
                'type' => 'INT',
                'constraint' => '11'
            ],
            'harga_jual_a' => [
                'type' => 'INT',
                'constraint' => '11'
            ],
            'harga_jual_b' => [
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
        $this->forge->addKey('id_produk', true);
        // Membuat tabel produk
        $this->forge->createTable('t_produk', true);
    }

    public function down()
    {
        // Menghapus tabel produk
        $this->forge->dropTable('t_produk');
    }
}
