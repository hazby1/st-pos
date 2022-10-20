<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $useTimestamps = true;

    public function AllData()
    {
        return $this->db->table('t_kategori')
            ->get()
            ->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('t_kategori')->insert($data);
    }

    public function UpdateData($data)
    {
        $this->db->table('t_kategori')
            ->where('id_kategori', $data['id_kategori'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('t_kategori')
            ->where('id_kategori', $data['id_kategori'])
            ->delete($data);
    }
}
