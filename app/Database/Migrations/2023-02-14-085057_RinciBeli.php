<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RinciBeli extends Migration
{
    public function up()
    {
        // Menambah field Rinci Beli
        $this->forge->addField([
            'id_rinci_beli' => [
                'type' => 'INT',
                'constraint' => '11',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nota_beli' => [
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
            'id_supplier' => [
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
        $this->forge->addKey('id_rinci_beli', true);

        // membuat tabel rinci beli
        $this->forge->createTable('t_rinci_beli', true);
    }

    public function down()
    {
        // Menghapus tabel rinci beli
        $this->forge->dropTable('t_rinci_beli');
    }
}
