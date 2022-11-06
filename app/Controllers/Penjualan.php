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

    public function RemoveItemCart($rowid)
    {
        # code...
        $cart = \Config\Services::cart();
        $cart->remove($rowid);

        return redirect()->to(base_url('penjualan'));
    }

    public function SimpanTransaksi()
    {
        # code...
        $cart = \Config\Services::cart();
        $produk = $cart->contents();
        $no_faktur = $this->PenjualanModel->NoFaktur();
        $dibayar = str_replace(",", "", $this->request->getPost('dibayar'));
        $kembalian = str_replace(",", "", $this->request->getPost('kembalian'));

        // Simpan ke t_rinci
        foreach ($produk as $key => $nilai) {
            # code...
            $data = [
                'no_faktur' => $no_faktur,
                'kode_produk' => $nilai['id'],
                'harga_jual' => $nilai['price'],
                'qty' => $nilai['qty'],
                'total_harga' => $nilai['subtotal'],
            ];
            $this->PenjualanModel->InsertRinciJual($data);
        }

        // Simpan ke t_jual
        foreach ($produk as $key => $nilai) {
            # code...
            $data = [
                'no_faktur' => $no_faktur,
                'tgl_jual' => date('Y-m-d'),
                'jam' => date('H:i:s'),
                'grand_total' => $cart->total(),
                'dibayar' => $dibayar,
                'kembalian' => $kembalian,
                'id_kasir' => session()->get('id_user'),
            ];
            $this->PenjualanModel->InsertJual($data);

            $cart->destroy();
            session()->setFlashdata('pesan', 'Transaksi berhasil!');
            return redirect()->to('Penjualan');
        }
    }
}
