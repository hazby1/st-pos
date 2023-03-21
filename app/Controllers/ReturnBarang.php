<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\AdminModel;
use App\Models\ReturnBarangModel;
use App\Models\PenjualanModel;
use App\Models\PelangganModel;
use App\Models\SupplierModel;

class ReturnBarang extends BaseController
{
    public function __construct()
    {
        # code...
        $this->ProdukModel = new ProdukModel();
        $this->AdminModel = new AdminModel();
        $this->ReturnBarangModel = new ReturnBarangModel();
        $this->PenjualanModel = new PenjualanModel();
        $this->PelangganModel = new PelangganModel();
        $this->SupplierModel = new SupplierModel();
    }

    public function index()
    {
        return redirect()->to(base_url('returnbarang/penjualan'));
    }

    // Return Penjualan

    public function Penjualan()
    {
        # code...
        $data = [
            'judul' => 'Return Barang',
            'subjudul' => 'Penjualan',
            'menu' => 'return barang',
            'submenu' => 'return penjualan',
            'page' => 'return/v_return_penjualan',
            'web' => $this->AdminModel->DetailData()
        ];
        return view('v_template', $data);
    }

    public function ViewTransaksi()
    {
        # code...
        $no_faktur = $this->request->getPost('no_faktur');
        $data = [
            'judul' => 'Return Barang',
            'subjudul' => 'Penjualan',
            'datareturnpenjualan' => $this->ReturnBarangModel->DataTransaksi($no_faktur),
            'web' => $this->AdminModel->DetailData(),
            'no_faktur' => $no_faktur,
            'pelanggan' => $this->ReturnBarangModel->Pelanggan($no_faktur)
        ];
        $response = [
            'data' => view('return/v_t_return_penjualan', $data)
        ];
        echo json_encode($response);
        // echo dd($response);
    }

    public function ReturnBarangPenjualan()
    {
        # code...
        $data = [
            'no_faktur' => $this->request->getPost('no_faktur'),
            'kode_produk' => $this->request->getPost('kode_produk'),
            'qty' => $this->request->getPost('qty'),
            'harga' => $this->request->getPost('harga'),
            'id_pelanggan' => $this->request->getPost('id_pelanggan'),
            'id_kasir' => session()->get('id_user'),
            'status' => '1', // 1 = Penjualan
            'alasan' => $this->request->getPost('alasan')
        ];

        $this->ReturnBarangModel->ReturnBarangPenjualan($data);

        $dataupdate = [
            'no_faktur' => $this->request->getPost('no_faktur'),
            'kode_produk' => $this->request->getPost('kode_produk'), // Butuh trigger di database
        ];

        $this->ReturnBarangModel->UpdatePenjualan($dataupdate);

        session()->setFlashdata('pesan', 'Produk berhasil direturn!');

        return redirect()->to(base_url('ReturnBarang/Penjualan'));

        // echo dd($data);
    }

    // Return Pembelian

    public function Pembelian()
    {
        # code...
        $data = [
            'judul' => 'Return Barang',
            'subjudul' => 'Pembelian',
            'menu' => 'return barang',
            'submenu' => 'return pembelian',
            'page' => 'return/v_return_pembelian',
            'web' => $this->AdminModel->DetailData()
        ];
        return view('v_template', $data);
    }

    public function ViewPembelian()
    {
        # code...
        $nota_beli = $this->request->getPost('nota_beli');
        $data = [
            'judul' => 'Return Barang',
            'subjudul' => 'Pembelian',
            'datareturnpembelian' => $this->ReturnBarangModel->DataPembelian($nota_beli),
            'web' => $this->AdminModel->DetailData(),
            'nota_beli' => $nota_beli,
            'supplier' => $this->ReturnBarangModel->Supplier($nota_beli)
        ];
        $response = [
            'data' => view('return/v_t_return_pembelian', $data)
        ];
        echo json_encode($response);
        // echo dd($response);
    }

    public function ReturnBarangPembelian()
    {
        # code...
        $data = [
            'nota_beli' => $this->request->getPost('nota_beli'),
            'kode_produk' => $this->request->getPost('kode_produk'),
            'qty' => $this->request->getPost('qty'),
            'harga' => $this->request->getPost('harga'),
            'id_supplier' => $this->request->getPost('id_supplier'),
            'id_kasir' => session()->get('id_user'),
            'status' => '2', // 2 = Pembelian
            'alasan' => $this->request->getPost('alasan')
        ];

        $this->ReturnBarangModel->ReturnBarangPembelian($data);

        $dataupdate = [
            'nota_beli' => $this->request->getPost('nota_beli'),
            'kode_produk' => $this->request->getPost('kode_produk'), // Butuh trigger di database
        ];

        $this->ReturnBarangModel->UpdatePembelian($dataupdate);

        session()->setFlashdata('pesan', 'Produk berhasil direturn!');

        return redirect()->to(base_url('ReturnBarang/Pembelian'));

        // echo dd($data);
    }

    // All Return Penjualan
    public function AllReturnPenjualan()
    {
        # code...
        $data = [
            'judul' => 'Return Barang',
            'subjudul' => 'Penjualan',
            'menu' => 'return barang',
            'submenu' => 'all return penjualan',
            'page' => 'return/v_all_return_penjualan',
            'allreturnpenjualan' => $this->ReturnBarangModel->AllReturnPenjualan(),
        ];

        return view('v_template', $data);

        // echo dd($data);
    }

    // All Return Pembelian
    public function AllReturnPembelian()
    {
        # code...
        $data = [
            'judul' => 'Return Barang',
            'subjudul' => 'Pembelian',
            'menu' => 'return barang',
            'submenu' => 'all return pembelian',
            'page' => 'return/v_all_return_pembelian',
            'allreturnpembelian' => $this->ReturnBarangModel->AllReturnPembelian(),
        ];

        return view('v_template', $data);

        // echo dd($data);
    }
}
