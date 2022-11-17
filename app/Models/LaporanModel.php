<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    public function DataHarian($tgl)
    {
        # code...
        return $this->db->table('t_rinci')
            ->join('t_produk', 't_produk.kode_produk=t_rinci.kode_produk')
            ->join('t_jual', 't_jual.no_faktur=t_rinci.no_faktur')
            ->where('t_jual.tgl_jual', $tgl)
            ->select('t_rinci.kode_produk')
            ->select('t_produk.nama_produk')
            ->select('t_rinci.modal')
            ->select('t_rinci.harga')
            ->groupBy('t_rinci.kode_produk')
            ->selectSum('t_rinci.qty')
            ->selectSum('t_rinci.total_harga')
            ->selectSum('t_rinci.untung')
            ->get()->getResultArray();
    }
}
