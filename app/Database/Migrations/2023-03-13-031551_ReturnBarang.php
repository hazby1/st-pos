<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ReturnBarang extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_return_barang' => [
                'type' => 'INT',
                'constraint' => '11',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'no_faktur' => [
                'type' => 'VARCHAR',
                'constraint' => '50'
            ],
            'nota_beli' => [
                'type' => 'VARCHAR',
                'constraint' => '50'
            ],
            'kode_produk' => [
                'type' => 'VARCHAR',
                'constraint' => '25'
            ],
            'id_pelanggan' => [
                'type' => 'INT',
                'constraint' => '11'
            ],
            'id_supplier' => [
                'type' => 'INT',
                'constraint' => '11'
            ],
            'id_kasir' => [
                'type' => 'INT',
                'constraint' => '11'
            ],
            'harga' => [
                'type' => 'INT',
                'constraint' => '25'
            ],
            'qty' => [
                'type' => 'INT',
                'constraint' => '11'
            ],
            'alasan' => [
                'type' => 'ENUM',
                'constraint' => '1', '2', '3',
                'default' => '1'
                // 1 = cacat
                // 2 = salah type barang
                // 3 = lainnya
            ],
            'status' => [
                'type' => 'INT',
                'constraint' => '11',
            ],
        ]);

        // Membuah primary key
        $this->forge->addKey('id_return_barang', true);

        // membuat tabel return barang
        $this->forge->createTable('t_return_barang', true);
    }

    public function down()
    {
        // Menghapus tabel return barang
        $this->forge->dropTable('t_return_barang');
    }
}
