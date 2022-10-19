<?php

namespace App\Models;

use CodeIgniter\Model;

class SatuanModel extends Model
{
    public function AllData()
    {
        return $this->db->table('t_satuan')
            ->get()
            ->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('t_satuan')->insert($data);
    }
}
