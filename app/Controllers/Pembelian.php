<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PembelianModel;
use App\Models\LaporanModel;
use App\Models\AdminModel;
use App\Models\SupplierModel;
use App\Models\KategoriModel;
use App\Models\SatuanModel;

class Pembelian extends BaseController
{
    public function __construct()
    {
        $this->PembelianModel = new PembelianModel();
        $this->LaporanModel = new LaporanModel();
        $this->AdminModel = new AdminModel();
        $this->SupplierModel = new SupplierModel();
        $this->KategoriModel = new KategoriModel();
        $this->SatuanModel = new SatuanModel();
    }

    public function index()
    {
        //
        $cart = \Config\Services::cart();
        $data = [
            'judul' => 'Pembelian',
            'subjudul' => 'Belanja Produk',
            'nota_beli' => $this->PembelianModel->NotaBeli(),
            'page' => 'v_pembelian',
            'menu' => 'pembelian',
            'submenu' => 'user',
            'cart' => $cart->contents(),
            'grand_total' => $cart->total(),
            'produk' => $this->PembelianModel->AllProduk(),
            'supplier' => $this->SupplierModel->AllData(),
            'kategori' => $this->KategoriModel->AllData(),
            'satuan' => $this->SatuanModel->AllData(),
        ];
        return view('v_template', $data);
    }

    public function CekProduk()
    {
        $kode_produk = $this->request->getPost('kode_produk');
        $produk = $this->PembelianModel->CekProduk($kode_produk);
        if ($produk == null) {
            $data = [
                'nama_produk' => '',
                'nama_kategori' => '',
                'nama_satuan' => '',
                'harga_jual' => '',
                'harga_beli' => '',
            ];
        } else {
            $data = [
                'nama_produk' => $produk['nama_produk'],
                'nama_kategori' => $produk['nama_kategori'],
                'nama_satuan' => $produk['nama_satuan'],
                'harga_jual' => $produk['harga_jual'],
                'harga_beli' => $produk['harga_beli'],
            ];
        }
        echo json_encode($data);
    }

    public function InsertCart()
    {
        # code...
        $cart = \Config\Services::cart();

        // Insert an array of values
        $cart->insert(array(
            'id' => $this->request->getPost('kode_produk'),
            'qty' => $this->request->getPost('qty'),
            'price' => $this->request->getPost('harga'),
            'name' => $this->request->getPost('nama_produk'),
            'option' => array(
                'nama_kategori' => $this->request->getPost('nama_kategori'),
                'nama_satuan' => $this->request->getPost('nama_satuan'),
            ),
        ));
        return redirect()->to(base_url('pembelian'));
    }

    public function ViewCart()
    {
        # code...
        $cart = \Config\Services::cart();
        $data = $cart->contents();

        echo dd($data);
    }

    public function ResetCart()
    {
        # code...
        $cart = \Config\Services::cart();
        $cart->destroy();
        return redirect()->to('pembelian');
    }

    public function RemoveItemCart($rowid)
    {
        # code...
        $cart = \Config\Services::cart();
        $cart->remove($rowid);

        return redirect()->to(base_url('pembelian'));
    }

    public function SimpanTransaksi()
    {
        # code...
        $cart = \Config\Services::cart();
        $produk = $cart->contents();
        $nota_beli = $this->PembelianModel->NotaBeli();

        // Simpan ke t_rinci_beli
        foreach ($produk as $key => $nilai) {
            # code...
            $data = [
                'nota_beli' => $nota_beli,
                'kode_produk' => $nilai['id'],
                'harga' => $nilai['price'],
                'qty' => $nilai['qty'],
                'total_harga' => $nilai['subtotal'],
                'id_supplier' => $this->request->getPost('supplier'),
            ];
            $this->PembelianModel->InsertRinciBeli($data);
        }

        // Simpan ke t_beli
        foreach ($produk as $key => $nilai) {
            # code...
            $data = [
                'nota_beli' => $nota_beli,
                'tgl_beli' => date('Y-m-d'),
                'grand_total' => $cart->total(),
                'id_kasir' => session()->get('id_user'),
            ];
            $this->PembelianModel->InsertBeli($data);
        }

        // Bismillah
        foreach ($produk as $key => $nilai) {
            $data = [
                'judul' => 'Transaksi',
                'page' => 'laporan/v_cetak_pembelian',
                'datapembelian' => $this->LaporanModel->DataPembelian($nota_beli),
                'web' => $this->AdminModel->DetailData(),
                'nota_beli' => $nota_beli,
            ];

            $cart->destroy();
            session()->setFlashdata('pesan', 'Pembelian berhasil!');
            return redirect()->to('Pembelian');
        }
    }

    // Batal Pembelian
    public function BatalPembelian($nota_beli)
    {
        # code... ubah status pembelian
        $data = [
            'nota_beli' => $nota_beli,
            'status' => 'batal'
        ];

        $this->PembelianModel->BatalPembelian($data);

        session()->setFlashdata('pesan', 'Nota Pembelian berhasil dibatalkan!');

        return redirect()->to('Laporan/Pembelian');
    }
}
