<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Servis extends Migration
{
    public function up()
    {
        // Membuat tabel servis
        $this->forge->addField([
            'id_servis' => [
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'no_servis' => [
                'type' => 'VARCHAR',
                'constraint' => '25'
            ],
            'tgl_masuk' => [
                'type' => 'DATE',
            ],
            'pemilik' => [
                'type' => 'INT',
                'constraint' => '3'
            ],
            'penerima' => [
                'type' => 'INT',
                'constraint' => '3',
            ],
            'kategori' => [
                'type' => 'INT',
                'constraint' => '3'
            ],
            'merk' => [
                'type' => 'VARCHAR',
                'constraint' => '50'
            ],
            'type' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'sn' => [
                'type' => 'VARCHAR',
                'constraint' => '50'
            ],
            'kelengkapan' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'kerusakan' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'biaya' => [
                'type' => 'INT',
                'constraint' => '11'
            ],
            'penanganan' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'tgl_keluar' => [
                'type' => 'DATE',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['proses', 'bisa diambil', 'diambil']
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME'
        ]);

        // Membuat primary key
        $this->forge->addKey('id_servis', true);
        // Membuat tabel servis
        $this->forge->createTable('t_servis', true);
    }

    public function down()
    {
        // Menghapus tabel servis
        $this->forge->dropTable('t_servis');
    }
}
