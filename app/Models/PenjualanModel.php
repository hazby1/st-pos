<?php

namespace App\Models;

use CodeIgniter\Database\SQLite3\Table;
use CodeIgniter\Model;

use function PHPSTORM_META\elementType;

class PenjualanModel extends Model
{
    public function NoFaktur()
    {
        $tgl = date('Ymd');
        $query = $this->db->query("SELECT MAX(RIGHT(no_faktur,4)) as no_urut FROM t_jual WHERE DATE(tgl_jual)='$tgl'");
        $hasil = $query->getRowArray();

        if ($hasil['no_urut'] > 0) {
            $tmp = $hasil['no_urut'] + 1;
            $kd = sprintf("%04s", $tmp);
        } else {
            $kd = "0001";
        }

        $no_faktur = date('Ymd') . $kd;
        return $no_faktur;
    }

    public function CekProduk($kode_produk)
    {
        return $this->db->table('t_produk')
            ->join('t_kategori', 't_kategori.id_kategori=t_produk.id_kategori')
            ->join('t_satuan', 't_satuan.id_satuan=t_produk.id_satuan')
            ->where('kode_produk', $kode_produk)
            ->get()
            ->getRowArray();
    }

    public function AllProduk()
    {
        return $this->db->table('t_produk')
            ->join('t_kategori', 't_kategori.id_kategori=t_produk.id_kategori')
            ->join('t_satuan', 't_satuan.id_satuan=t_produk.id_satuan')
            ->orderBy('id_produk')
            ->where('stok > 0')
            ->get()
            ->getResultArray();
    }

    public function InsertJual($data)
    {
        # code...
        $this->db->table('t_jual')->insert($data);
    }

    public function InsertRinciJual($data)
    {
        # code...
        $this->db->table('t_rinci')->insert($data);
    }
}
