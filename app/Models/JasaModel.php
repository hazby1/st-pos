<?php

namespace App\Models;

use CodeIgniter\Model;

class JasaModel extends Model
{
    protected $useTimestamps = true;

    public function AllData()
    {
        return $this->db->table('t_jasa')
            ->join('t_kategori', 't_kategori.id_kategori=t_jasa.id_kategori')
            ->join('t_satuan', 't_satuan.id_satuan=t_jasa.id_satuan')
            ->orderBy('id_jasa', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('t_jasa')->insert($data);
    }

    public function UpdateData($data)
    {
        $this->db->table('t_jasa')
            ->where('id_jasa', $data['id_jasa'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('t_jasa')
            ->where('id_jasa', $data['id_jasa'])
            ->delete($data);
    }
}
