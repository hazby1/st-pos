<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenjualanModel;
use App\Models\LaporanModel;
use App\Models\AdminModel;
use App\Models\PelangganModel;

class Penjualan extends BaseController
{
    public function __construct()
    {
        $this->PenjualanModel = new PenjualanModel();
        $this->LaporanModel = new LaporanModel();
        $this->AdminModel = new AdminModel();
        $this->PelangganModel = new PelangganModel();
    }

    // User

    public function index()
    {
        $cart = \Config\Services::cart();
        $data = [
            'judul' => 'Penjualan',
            'subjudul' => 'user',
            'no_faktur' => $this->PenjualanModel->NoFaktur(),
            'cart' => $cart->contents(),
            'grand_total' => $cart->total(),
            'produk' => $this->PenjualanModel->AllProduk(),
            'pelanggan' => $this->PelangganModel->AllData(),
            'page' => 'v_penjualan_tes'
        ];
        return view('v_template_penjualan', $data);
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
        $harga = $this->request->getPost('harga_jual');
        $diskon = $this->request->getPost('diskon');
        $pajak = $this->request->getPost('pajak') / 100 * $harga;

        // Insert an array of values
        $cart->insert(array(
            'id' => $this->request->getPost('kode_produk'),
            'qty' => $this->request->getPost('qty'),
            'price' => $harga - $diskon + $pajak,
            'name' => $this->request->getPost('nama_produk'),
            'option' => array(
                'nama_kategori' => $this->request->getPost('nama_kategori'),
                'nama_satuan' => $this->request->getPost('nama_satuan'),
                'modal' => $this->request->getPost('harga_beli'),
                'diskon' => $diskon,
                'pajak' => $pajak,
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
                'harga' => $nilai['price'],
                'modal' => $nilai['option']['modal'],
                'qty' => $nilai['qty'],
                'total_harga' => $nilai['subtotal'],
                'untung' => ($nilai['price'] - $nilai['option']['modal']) * $nilai['qty'],
                'pajak' => $nilai['option']['pajak'],
                'diskon' => $nilai['option']['diskon'],
                'id_pelanggan' => $this->request->getPost('pelanggan'),
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
        }

        // Bismillah
        foreach ($produk as $key => $nilai) {
            $data = [
                'judul' => 'Transaksi',
                'page' => 'laporan/v_cetak_transaksi',
                'datatransaksi' => $this->LaporanModel->DataTransaksi($no_faktur),
                'web' => $this->AdminModel->DetailData(),
                'no_faktur' => $no_faktur,
            ];

            $cart->destroy();
            session()->setFlashdata('pesan', 'Transaksi berhasil!');
            return redirect()->to('Penjualan');
        }
    }

    // Batal Transaksi
    public function BatalTransaksi($no_faktur)
    {
        # code... ubah status transaksi
        $data = [
            'no_faktur' => $no_faktur,
            'status' => 'batal'
        ];

        $this->PenjualanModel->BatalTransaksi($data);

        session()->setFlashdata('pesan', 'Faktur berhasil dibatalkan!');

        return redirect()->to('Laporan/AllTransaksi');
    }

    // Reseller A


    public function ResellerA()
    {
        $cart = \Config\Services::cart();
        $data = [
            'judul' => 'Penjualan',
            'subjudul' => 'Reseller A',
            'no_faktur' => $this->PenjualanModel->NoFaktur(),
            'cart' => $cart->contents(),
            'grand_total' => $cart->total(),
            'produk' => $this->PenjualanModel->AllProduk(),
            'pelanggan' => $this->PelangganModel->PelangganA(),
            'page' => 'v_penjualan_a'
        ];
        return view('v_template_penjualan', $data);
    }

    public function CekProdukA()
    {
        $kode_produk = $this->request->getPost('kode_produk');
        $produk = $this->PenjualanModel->CekProduk($kode_produk);
        if ($produk == null) {
            $data = [
                'nama_produk' => '',
                'nama_kategori' => '',
                'nama_satuan' => '',
                'harga_jual_a' => '',
                'harga_beli' => '',
            ];
        } else {
            $data = [
                'nama_produk' => $produk['nama_produk'],
                'nama_kategori' => $produk['nama_kategori'],
                'nama_satuan' => $produk['nama_satuan'],
                'harga_jual_a' => $produk['harga_jual_a'],
                'harga_beli' => $produk['harga_beli'],
            ];
        }
        echo json_encode($data);
    }

    public function InsertCartA()
    {
        # code...
        $cart = \Config\Services::cart();
        $harga = $this->request->getPost('harga_jual_a');
        $diskon = $this->request->getPost('diskon');
        $pajak = $this->request->getPost('pajak') / 100 * $harga;

        // Insert an array of values
        $cart->insert(array(
            'id' => $this->request->getPost('kode_produk'),
            'qty' => $this->request->getPost('qty'),
            'price' => $this->request->getPost('harga_jual_a'),
            'price' => $harga - $diskon + $pajak,
            'name' => $this->request->getPost('nama_produk'),
            'option' => array(
                'nama_kategori' => $this->request->getPost('nama_kategori'),
                'nama_satuan' => $this->request->getPost('nama_satuan'),
                'modal' => $this->request->getPost('harga_beli'),
                'diskon' => $diskon,
                'pajak' => $pajak,
            ),
        ));
        return redirect()->to(base_url('penjualan/ResellerA'));
    }

    public function ViewCartA()
    {
        # code...
        $cart = \Config\Services::cart();
        $data = $cart->contents();

        echo dd($data);
    }

    public function ResetCartA()
    {
        # code...
        $cart = \Config\Services::cart();
        $cart->destroy();
        return redirect()->to('penjualan/ResellerA');
    }

    public function RemoveItemCartA($rowid)
    {
        # code...
        $cart = \Config\Services::cart();
        $cart->remove($rowid);

        return redirect()->to(base_url('penjualan/ResellerA'));
    }

    public function SimpanTransaksiA()
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
                'harga' => $nilai['price'],
                'modal' => $nilai['option']['modal'],
                'qty' => $nilai['qty'],
                'total_harga' => $nilai['subtotal'],
                'untung' => ($nilai['price'] - $nilai['option']['modal']) * $nilai['qty'],
                'pajak' => $nilai['option']['pajak'],
                'diskon' => $nilai['option']['diskon'],
                'id_pelanggan' => $this->request->getPost('pelanggan'),
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
            return redirect()->to('Penjualan/ResellerA');
        }
    }

    // Reseller B


    public function ResellerB()
    {
        $cart = \Config\Services::cart();
        $data = [
            'judul' => 'Penjualan',
            'subjudul' => 'Reseller B',
            'no_faktur' => $this->PenjualanModel->NoFaktur(),
            'cart' => $cart->contents(),
            'grand_total' => $cart->total(),
            'produk' => $this->PenjualanModel->AllProduk(),
            'pelanggan' => $this->PelangganModel->PelangganB(),
            'page' => 'v_penjualan_b'
        ];
        return view('v_template_penjualan', $data);
    }

    public function CekProdukB()
    {
        $kode_produk = $this->request->getPost('kode_produk');
        $produk = $this->PenjualanModel->CekProduk($kode_produk);
        if ($produk == null) {
            $data = [
                'nama_produk' => '',
                'nama_kategori' => '',
                'nama_satuan' => '',
                'harga_jual_b' => '',
                'harga_beli' => '',
            ];
        } else {
            $data = [
                'nama_produk' => $produk['nama_produk'],
                'nama_kategori' => $produk['nama_kategori'],
                'nama_satuan' => $produk['nama_satuan'],
                'harga_jual_b' => $produk['harga_jual_b'],
                'harga_beli' => $produk['harga_beli'],
            ];
        }
        echo json_encode($data);
    }

    public function InsertCartB()
    {
        # code...
        $cart = \Config\Services::cart();
        $harga = $this->request->getPost('harga_jual_b');
        $diskon = $this->request->getPost('diskon');
        $pajak = $this->request->getPost('pajak') / 100 * $harga;

        // Insert an array of values
        $cart->insert(array(
            'id' => $this->request->getPost('kode_produk'),
            'qty' => $this->request->getPost('qty'),
            'price' => $this->request->getPost('harga_jual_b'),
            'price' => $harga - $diskon + $pajak,
            'name' => $this->request->getPost('nama_produk'),
            'option' => array(
                'nama_kategori' => $this->request->getPost('nama_kategori'),
                'nama_satuan' => $this->request->getPost('nama_satuan'),
                'modal' => $this->request->getPost('harga_beli'),
                'diskon' => $diskon,
                'pajak' => $pajak,
            ),
        ));
        return redirect()->to(base_url('penjualan/ResellerB'));
    }

    public function ViewCartB()
    {
        # code...
        $cart = \Config\Services::cart();
        $data = $cart->contents();

        echo dd($data);
    }

    public function ResetCartB()
    {
        # code...
        $cart = \Config\Services::cart();
        $cart->destroy();
        return redirect()->to('penjualan/ResellerB');
    }

    public function RemoveItemCartB($rowid)
    {
        # code...
        $cart = \Config\Services::cart();
        $cart->remove($rowid);

        return redirect()->to(base_url('penjualan/ResellerB'));
    }

    public function SimpanTransaksiB()
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
                'harga' => $nilai['price'],
                'modal' => $nilai['option']['modal'],
                'qty' => $nilai['qty'],
                'total_harga' => $nilai['subtotal'],
                'untung' => ($nilai['price'] - $nilai['option']['modal']) * $nilai['qty'],
                'pajak' => $nilai['option']['pajak'],
                'diskon' => $nilai['option']['diskon'],
                'id_pelanggan' => $this->request->getPost('pelanggan'),
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
            return redirect()->to('Penjualan/ResellerB');
        }
    }
}
