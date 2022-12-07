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

        // $db = db_connect();
        // $query = $db->query('
        // SELECT t_rinci.kode_produk,
        // t_produk.nama_produk,
        // t_rinci.harga,
        // t_rinci.untung,
        // t_rinci.modal,
        // sum(t_rinci.qty) as qty,
        // sum(t_rinci.qty*t_rinci.harga) as jumlah
        // FROM t_rinci
        // LEFT JOIN t_produk on
        // t_produk.kode_produk=t_rinci.kode_produk
        // GROUP BY t_rinci.kode_produk
        // ');
        // return $query->getResultArray();
    }

    public function DataBulanan($bulan, $tahun)
    {
        # code...
        return $this->db->table('t_rinci')
            ->join('t_jual', 't_jual.no_faktur=t_rinci.no_faktur')
            ->where('month(t_jual.tgl_jual)', $bulan)
            ->where('year(t_jual.tgl_jual)', $tahun)
            ->select('t_jual.tgl_jual')
            ->groupBy('t_jual.tgl_jual')
            ->selectSum('t_rinci.total_harga')
            ->selectSum('t_rinci.untung')
            ->get()->getResultArray();
    }

    public function DataTahunan($tahun)
    {
        # code...
        return $this->db->table('t_rinci')
            ->join('t_jual', 't_jual.no_faktur=t_rinci.no_faktur')
            ->where('year(t_jual.tgl_jual)', $tahun)
            ->select('month(t_jual.tgl_jual) as bulan')
            ->groupBy('month(t_jual.tgl_jual)')
            ->selectSum('t_rinci.total_harga')
            ->selectSum('t_rinci.untung')
            ->get()->getResultArray();
    }
}
