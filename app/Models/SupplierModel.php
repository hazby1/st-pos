<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    public function AllData()
    {
        return $this->db->table('t_supplier')
            ->where('hapus', 'tidak')
            ->orderBy('nama_supplier', 'ASC')
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        # code...
        $this->db->table('t_supplier')->insert($data);
    }

    public function UpdateData($data)
    {
        # code...
        $this->db->table('t_supplier')
            ->where('id_supplier', $data['id_supplier'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        # code...
        $this->db->table('t_supplier')
            ->where('id_supplier', $data['id_supplier'])
            ->update($data);
    }
}
