<?php

namespace App\Models;

use CodeIgniter\Model;

class PelangganModel extends Model
{
    public function AllData()
    {
        return $this->db->table('t_pelanggan')
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
            ->delete($data);
    }
}
