<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $useTimestamps = true;

    public function AllData()
    {
        return $this->db->table('t_produk')
            ->join('t_kategori', 't_kategori.id_kategori=t_produk.id_kategori')
            ->join('t_satuan', 't_satuan.id_satuan=t_produk.id_satuan')
            ->orderBy('id_produk', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('t_produk')->insert($data);
    }

    public function UpdateData($data)
    {
        $this->db->table('t_produk')
            ->where('id_produk', $data['id_produk'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('t_produk')
            ->where('id_produk', $data['id_produk'])
            ->delete($data);
    }
}
