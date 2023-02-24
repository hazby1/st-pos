<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    public function DetailData()
    {
        return $this->db->table('t_setting')
            ->where('id_setting', ' 1')
            ->get()
            ->getRowArray();
    }

    public function UpdateData($data)
    {
        $this->db->table('t_setting')
            ->where('id_setting', $data['id_setting'])
            ->update($data);
    }

    public function Grafik()
    {
        # code...
        return $this->db->table('t_rinci')
            ->join('t_jual', 't_jual.no_faktur=t_rinci.no_faktur')
            ->where('month(t_jual.tgl_jual)', date('m'))
            ->where('year(t_jual.tgl_jual)', date('Y'))
            ->select('t_jual.tgl_jual')
            ->groupBy('t_jual.tgl_jual')
            ->selectSum('t_rinci.total_harga')
            ->selectSum('t_rinci.untung')
            ->get()->getResultArray();
    }

    public function PendapatanHariIni()
    {
        # code...
        return $this->db->table('t_rinci')
            ->join('t_jual', 't_jual.no_faktur=t_rinci.no_faktur')
            ->where('t_jual.tgl_jual', date('y-m-d'))
            ->groupBy('t_jual.tgl_jual')
            ->selectSum('t_rinci.total_harga')
            ->get()->getRowArray();
    }

    public function PendapatanBulanIni()
    {
        # code...
        return $this->db->table('t_rinci')
            ->join('t_jual', 't_jual.no_faktur=t_rinci.no_faktur')
            ->where('month(t_jual.tgl_jual)', date('m'))
            ->where('year(t_jual.tgl_jual)', date('Y'))
            ->groupBy('month(t_jual.tgl_jual)')
            ->selectSum('t_rinci.total_harga')
            ->get()->getRowArray();
    }

    public function PendapatanTahunIni()
    {
        # code...
        return $this->db->table('t_rinci')
            ->join('t_jual', 't_jual.no_faktur=t_rinci.no_faktur')
            ->where('year(t_jual.tgl_jual)', date('Y'))
            ->groupBy('year(t_jual.tgl_jual)')
            ->selectSum('t_rinci.total_harga')
            ->get()->getRowArray();
    }

    public function TotalProduk()
    {
        # code...
        return $this->db->table('t_produk')
            ->where('hapus', 'tidak')
            ->countAllResults();
    }

    public function TotalSatuan()
    {
        # code...
        return $this->db->table('t_satuan')
            ->where('hapus', 'tidak')
            ->countAllResults();
    }

    public function TotalKategori()
    {
        # code...
        return $this->db->table('t_kategori')
            ->where('hapus', 'tidak')
            ->countAllResults();
    }

    public function TotalPelanggan()
    {
        # code...
        return $this->db->table('t_pelanggan')
            ->where('hapus', 'tidak')
            ->countAllResults();
    }

    public function TotalUser()
    {
        # code...
        return $this->db->table('t_user')
            ->where('hapus', 'tidak')
            ->countAllResults();
    }

    public function TotalSupplier()
    {
        # code...
        return $this->db->table('t_supplier')
            ->where('hapus', 'tidak')
            ->countAllResults();
    }
}
