<?php

namespace App\Models;

use CodeIgniter\Model;

class PelangganModel extends Model
{
    public function AllPelanggan()
    {
        # code...
        return $this->db->table('t_pelanggan')
            ->where('hapus', 'tidak')
            ->orderBy('nama_pelanggan', 'ASC')
            ->get()->getResultArray();
    }

    public function AllData()
    {
        return $this->db->table('t_pelanggan')
            ->where('hapus', 'tidak')
            ->where('level', 'user')
            ->get()->getResultArray();
    }

    public function PelangganA()
    {
        return $this->db->table('t_pelanggan')
            ->where('hapus', 'tidak')
            ->where('level', 'a')
            ->get()->getResultArray();
    }

    public function PelangganB()
    {
        return $this->db->table('t_pelanggan')
            ->where('hapus', 'tidak')
            ->where('level', 'b')
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        # code...
        $this->db->table('t_pelanggan')->insert($data);
    }

    public function UpdateData($data)
    {
        # code...
        $this->db->table('t_pelanggan')
            ->where('id_pelanggan', $data['id_pelanggan'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        # code...
        $this->db->table('t_pelanggan')
            ->where('id_pelanggan', $data['id_pelanggan'])
            ->update($data);
    }
}
