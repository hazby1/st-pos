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
            ],
            'kode_produk' => [
                'type' => 'VARCHAR',
                'constraint' => '25'
            ],
            'harga' => [
                'type' => 'INT',
                'constraint' => '11'
            ],
            'harga_a' => [
                'type' => 'INT',
                'constraint' => '11'
            ],
            'harga_b' => [
                'type' => 'INT',
                'constraint' => '11'
            ],
            'modal' => [
                'type' => 'INT',
                'constraint' => '11'
            ],
            'qty' => [
                'type' => 'INT',
                'constraint' => '11'
            ],
            'return_barang' => [
                'type' => 'INT',
                'constraint' => '11'
            ],
            'total_harga' => [
                'type' => 'INT',
                'constraint' => '11'
            ],
            'untung' => [
                'type' => 'INT',
                'constraint' => '11'
            ],
            'id_pelanggan' => [
                'type' => 'INT',
                'constraint' => '11'
            ],
            'diskon' => [
                'type' => 'INT',
                'constraint' => '11'
            ],
            'pajak' => [
                'type' => 'INT',
                'constraint' => '11'
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['berhasil', 'batal', 'return'],
                'default' => 'berhasil'
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME'
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
