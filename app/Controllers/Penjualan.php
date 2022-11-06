<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenjualanModel;

class Penjualan extends BaseController
{
    public function __construct()
    {
        $this->PenjualanModel = new PenjualanModel();
    }

    public function index()
    {
        $cart = \Config\Services::cart();
        $data = [
            'judul' => 'Penjualan',
            'no_faktur' => $this->PenjualanModel->NoFaktur(),
            'cart' => $cart->contents(),
            'grand_total' => $cart->total(),
            'produk' => $this->PenjualanModel->AllProduk()
        ];
        return view('v_penjualan', $data);
    }

    public function CekProduk()
    {
        $kode_produk = $this->request->getPost('kode_produk');
        $produk = $this->PenjualanModel->CekProduk($kode_produk);
        if ($produk == null) {
            $data = [
                'nama_produk' => '',
                'nama_kategori' => '',
                'nama_satuan' => '',
                'harga_jual' => '',
            ];
        } else {
            $data = [
                'nama_produk' => $produk['nama_produk'],
                'nama_kategori' => $produk['nama_kategori'],
                'nama_satuan' => $produk['nama_satuan'],
                'harga_jual' => $produk['harga_jual'],
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
            'price' => $this->request->getPost('harga_jual'),
            'name' => $this->request->getPost('nama_produk'),
            'option' => array(
                'nama_kategori' => $this->request->getPost('nama_kategori'),
                'nama_satuan' => $this->request->getPost('nama_satuan'),
            ),
        ));
        return redirect()->to(base_url('penjualan'));
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
        return redirect()->to('penjualan');
    }
}
