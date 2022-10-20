<?php

namespace App\Models;

use CodeIgniter\Model;

class SatuanModel extends Model
{
    protected $useTimestamps = true;

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

    public function UpdateData($data)
    {
        $this->db->table('t_satuan')
            ->where('id_satuan', $data['id_satuan'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('t_satuan')
            ->where('id_satuan', $data['id_satuan'])
            ->delete($data);
    }
}
