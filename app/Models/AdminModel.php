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
        return $this->db->table('t_produk')->countAll();
    }

    public function TotalSatuan()
    {
        # code...
        return $this->db->table('t_satuan')->countAll();
    }

    public function TotalKategori()
    {
        # code...
        return $this->db->table('t_kategori')->countAll();
    }

    public function TotalUser()
    {
        # code...
        return $this->db->table('t_user')->countAll();
    }

    public function TotalJasa()
    {
        # code...
        return $this->db->table('t_jasa')->countAll();
    }

    public function TotalSupplier()
    {
        # code...
        return $this->db->table('t_supplier')->countAll();
    }
}
