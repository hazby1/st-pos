<?php

namespace App\Models;

use CodeIgniter\Model;

class PembelianModel extends Model
{
    public function NotaBeli()
    {
        # code...
        $tgl = date('Ymd');
        $query = $this->db->query("SELECT MAX(RIGHT(nota_beli,4)) as no_urut FROM t_beli WHERE DATE(tgl_beli)='$tgl'");
        $hasil = $query->getRowArray();

        if ($hasil['no_urut'] > 0) {
            $tmp = $hasil['no_urut'] + 1;
            $kd = sprintf("%04s", $tmp);
        } else {
            $kd = "0001";
        }

        $nota_beli = 1 . date('Ymd') . $kd;
        return $nota_beli;
    }

    public function CekProduk($kode_produk)
    {
        return $this->db->table('t_produk')
            ->join('t_kategori', 't_kategori.id_kategori=t_produk.id_kategori')
            ->join('t_satuan', 't_satuan.id_satuan=t_produk.id_satuan')
            ->where('t_produk.hapus', 'tidak')
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
            ->where('t_produk.hapus', 'tidak')
            ->get()
            ->getResultArray();
    }

    public function InsertBeli($data)
    {
        # code...
        $this->db->table('t_beli')->insert($data);
    }

    public function InsertRinciBeli($data)
    {
        # code...
        $this->db->table('t_rinci_beli')->insert($data);
    }

    public function BatalPembelian($data)
    {
        # code...
        $this->db->table('t_rinci_beli')
            ->where('nota_beli', $data['nota_beli'])
            ->update($data);
    }
}
