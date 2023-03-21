<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    public function Pelanggan($no_faktur)
    {
        # code...
        return $this->db->table('t_rinci')
            ->join('t_pelanggan', 't_pelanggan.id_pelanggan=t_rinci.id_pelanggan')
            ->where('no_faktur', $no_faktur)
            ->groupBy('t_rinci.id_pelanggan')
            ->select('t_pelanggan.nama_pelanggan')
            ->get()->getResultArray();
    }

    public function Supplier($nota_beli)
    {
        # code...
        return $this->db->table('t_rinci_beli')
            ->join('t_supplier', 't_supplier.id_supplier=t_rinci_beli.id_supplier')
            ->where('nota_beli', $nota_beli)
            ->groupBy('t_rinci_beli.id_supplier')
            ->select('t_supplier.nama_supplier')
            ->get()->getResultArray();
    }

    public function DataTransaksi($no_faktur)
    {
        # code...
        return $this->db->table('t_rinci')
            ->join('t_produk', 't_produk.kode_produk=t_rinci.kode_produk')
            ->join('t_jual', 't_jual.no_faktur=t_rinci.no_faktur')
            ->where('t_jual.no_faktur', $no_faktur)
            ->where('t_rinci.status', 'berhasil')
            ->select('t_rinci.kode_produk')
            ->select('t_produk.nama_produk')
            ->select('t_rinci.modal')
            ->select('t_rinci.diskon')
            ->select('t_rinci.pajak')
            ->select('t_rinci.harga')
            ->groupBy('t_rinci.kode_produk')
            ->select('t_rinci.qty')
            ->select('t_rinci.total_harga')
            ->get()->getResultArray();
    }

    public function DataPembelian($nota_beli)
    {
        # code...
        return $this->db->table('t_rinci_beli')
            ->join('t_produk', 't_produk.kode_produk=t_rinci_beli.kode_produk')
            ->join('t_beli', 't_beli.nota_beli=t_rinci_beli.nota_beli')
            ->where('t_beli.nota_beli', $nota_beli)
            ->where('t_rinci_beli.status', 'berhasil')
            ->select('t_rinci_beli.kode_produk')
            ->select('t_produk.nama_produk')
            ->select('t_rinci_beli.harga')
            ->groupBy('t_rinci_beli.kode_produk')
            ->select('t_rinci_beli.qty')
            ->select('t_rinci_beli.total_harga')
            ->get()->getResultArray();
    }

    public function Pembelian()
    {
        # code...
        return $this->db->table('t_rinci_beli')
            ->join('t_produk', 't_produk.kode_produk=t_rinci_beli.kode_produk')
            ->join('t_supplier', 't_supplier.id_supplier=t_rinci_beli.id_supplier')
            ->groupBy('t_rinci_beli.nota_beli')
            ->join('t_beli', 't_beli.nota_beli=t_rinci_beli.nota_beli')
            ->select('t_rinci_beli.nota_beli')
            ->select('t_supplier.nama_supplier')
            ->select('t_beli.grand_total')
            ->select('t_rinci_beli.status')
            ->orderBy('nota_beli', 'DESC')
            ->get()->getResultArray();
    }

    public function AllTransaksi()
    {
        # code...
        return $this->db->table('t_rinci')
            ->join('t_produk', 't_produk.kode_produk=t_rinci.kode_produk')
            ->join('t_pelanggan', 't_pelanggan.id_pelanggan=t_rinci.id_pelanggan')
            ->groupBy('t_rinci.no_faktur')
            ->join('t_jual', 't_jual.no_faktur=t_rinci.no_faktur')
            ->select('t_rinci.no_faktur')
            ->select('t_pelanggan.nama_pelanggan')
            ->select('t_jual.grand_total')
            ->select('t_rinci.status')
            ->orderBy('no_faktur', 'DESC')
            ->get()->getResultArray();
    }

    public function AllReturn()
    {
        # code...
        return $this->db->table('t_rinci')
            ->join('t_produk', 't_produk.kode_produk=t_rinci.kode_produk')
            ->join('t_pelanggan', 't_pelanggan.id_pelanggan=t_rinci.id_pelanggan')
            ->where('t_rinci.status', 'return')
            ->select('t_produk.nama_produk')
            ->select('t_rinci.no_faktur')
            ->select('t_rinci.harga')
            ->select('t_pelanggan.nama_pelanggan')
            ->select('t_rinci.status')
            ->get()->getResultArray();
    }

    public function DetailTransaksi($no_faktur)
    {
        # code...
        return $this->db->table('t_rinci')
            ->join('t_produk', 't_produk.kode_produk=t_rinci.kode_produk')
            ->join('t_jual', 't_jual.no_faktur=t_rinci.no_faktur')
            ->select('t_jual.tgl_jual')
            ->select('t_rinci.kode_produk')
            ->select('t_produk.nama_produk')
            ->select('t_rinci.diskon')
            ->select('t_rinci.pajak')
            ->select('t_rinci.harga')
            ->groupBy('t_rinci.kode_produk')
            ->selectSum('t_rinci.qty')
            ->selectSum('t_rinci.total_harga')
            ->selectSum('t_rinci.untung')
            ->get()->getResultArray();
    }

    public function DataHarian($tgl)
    {
        # code...
        return $this->db->table('t_rinci')
            ->join('t_produk', 't_produk.kode_produk=t_rinci.kode_produk')
            ->join('t_jual', 't_jual.no_faktur=t_rinci.no_faktur')
            ->where('t_jual.tgl_jual', $tgl)
            ->where('t_rinci.status', 'berhasil')
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
            ->where('t_rinci.status', 'berhasil')
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
            ->where('t_rinci.status', 'berhasil')
            ->select('month(t_jual.tgl_jual) as bulan')
            ->groupBy('month(t_jual.tgl_jual)')
            ->selectSum('t_rinci.total_harga')
            ->selectSum('t_rinci.untung')
            ->get()->getResultArray();
    }
}
