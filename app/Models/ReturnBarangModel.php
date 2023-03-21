<?php

namespace App\Models;

use CodeIgniter\Model;

class ReturnBarangModel extends Model
{
    public function Pelanggan($no_faktur)
    {
        # code...
        return $this->db->table('t_return_barang')
            ->join('t_pelanggan', 't_pelanggan.id_pelanggan=t_return_barang.id_pelanggan')
            ->where('no_faktur', $no_faktur)
            ->groupBy('t_return_barang.id_pelanggan')
            ->select('t_pelanggan.nama_pelanggan')
            ->get()->getResultArray();
    }

    public function Supplier($nota_beli)
    {
        # code...
        return $this->db->table('t_return_barang')
            ->join('t_supplier', 't_supplier.id_supplier=t_return_barang.id_supplier')
            ->where('nota_beli', $nota_beli)
            ->groupBy('t_return_barang.id_supplier')
            ->select('t_supplier.nama_supplier')
            ->get()->getResultArray();
    }

    // Penjualan
    public function DataTransaksi($no_faktur)
    {
        # code...
        return $this->db->table('t_rinci')
            ->join('t_produk', 't_produk.kode_produk=t_rinci.kode_produk')
            ->join('t_pelanggan', 't_pelanggan.id_pelanggan=t_rinci.id_pelanggan')
            ->where('t_rinci.no_faktur', $no_faktur)
            ->where('t_rinci.status', 'berhasil')
            ->select('t_rinci.no_faktur')
            ->select('t_rinci.return_barang')
            ->select('t_rinci.kode_produk')
            ->select('t_rinci.diskon')
            ->select('t_rinci.pajak')
            ->select('t_rinci.id_pelanggan')
            ->select('t_pelanggan.nama_pelanggan')
            ->select('t_produk.nama_produk')
            ->select('t_rinci.harga')
            ->groupBy('t_rinci.kode_produk')
            ->select('t_rinci.qty')
            ->select('t_rinci.total_harga')
            ->get()->getResultArray();
    }

    public function ReturnBarangPenjualan($data)
    {
        # code...
        $this->db->table('t_return_barang')
            ->insert($data);
    }

    public function UpdatePenjualan($dataupdate)
    {
        # code...
        $this->db->table('t_rinci')
            ->where('no_faktur', $dataupdate['no_faktur'])
            ->where('kode_produk', $dataupdate['kode_produk'])
            ->update($dataupdate);
    }

    // Pembelian
    public function DataPembelian($nota_beli)
    {
        # code...
        return $this->db->table('t_rinci_beli')
            ->join('t_produk', 't_produk.kode_produk=t_rinci_beli.kode_produk')
            ->join('t_supplier', 't_supplier.id_supplier=t_rinci_beli.id_supplier')
            ->where('t_rinci_beli.nota_beli', $nota_beli)
            ->where('t_rinci_beli.status', 'berhasil')
            ->select('t_rinci_beli.nota_beli')
            ->select('t_rinci_beli.return_barang')
            ->select('t_rinci_beli.kode_produk')
            ->select('t_rinci_beli.id_supplier')
            ->select('t_supplier.nama_supplier')
            ->select('t_produk.nama_produk')
            ->select('t_rinci_beli.harga')
            ->groupBy('t_rinci_beli.kode_produk')
            ->select('t_rinci_beli.qty')
            ->select('t_rinci_beli.total_harga')
            ->get()->getResultArray();
    }

    public function ReturnBarangPembelian($data)
    {
        # code...
        $this->db->table('t_return_barang')
            ->insert($data);
    }

    public function UpdatePembelian($dataupdate)
    {
        # code...
        $this->db->table('t_rinci_beli')
            ->where('nota_beli', $dataupdate['nota_beli'])
            ->where('kode_produk', $dataupdate['kode_produk'])
            ->update($dataupdate);
    }

    public function AllReturnPenjualan()
    {
        # code...
        return $this->db->table('t_return_barang')
            ->join('t_produk', 't_produk.kode_produk=t_return_barang.kode_produk')
            ->join('t_pelanggan', 't_pelanggan.id_pelanggan=t_return_barang.id_pelanggan')
            ->select('t_return_barang.no_faktur')
            ->select('t_pelanggan.nama_pelanggan')
            ->select('t_return_barang.harga')
            ->where('t_return_barang.status', 1)
            ->groupBy('t_return_barang.id_return_barang')
            ->orderBy('id_return_barang', 'DESC')
            ->get()->getResultArray();
    }

    public function AllReturnPembelian()
    {
        # code...
        return $this->db->table('t_return_barang')
            ->join('t_produk', 't_produk.kode_produk=t_return_barang.kode_produk')
            ->join('t_supplier', 't_supplier.id_supplier=t_return_barang.id_supplier')
            ->select('t_return_barang.nota_beli')
            ->select('t_supplier.nama_supplier')
            ->select('t_return_barang.harga')
            ->groupBy('t_return_barang.id_return_barang')
            ->where('t_return_barang.status', 2)
            ->orderBy('id_return_barang', 'DESC')
            ->get()->getResultArray();
    }
}
