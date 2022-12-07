<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\KategoriModel;
use App\Models\SatuanModel;

class Produk extends BaseController
{
    public function __construct()
    {
        $this->ProdukModel = new ProdukModel();
        $this->KategoriModel = new KategoriModel();
        $this->SatuanModel = new SatuanModel();
    }

    public function index()
    {
        //
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Produk',
            'menu' => 'masterdata',
            'submenu' => 'produk',
            'page' => 'v_produk',
            'produk' => $this->ProdukModel->AllData(),
            'kategori' => $this->KategoriModel->AllData(),
            'satuan' => $this->SatuanModel->AllData(),
        ];
        return view('v_template', $data);
    }

    public function InsertData()
    {
        if ($this->validate([
            'kode_produk' => [
                'label' => 'Kode Produk',
                'rules' => 'is_unique[t_produk.kode_produk]',
                'errors' => [
                    'is_unique' => '{field} sudah ada, masukkan kode lain!',
                ]
            ],
        ])) {
            $hargabeli = str_replace(",", "", $this->request->getPost('harga_beli'));
            $hargajual = str_replace(",", "", $this->request->getPost('harga_jual'));
            $hargajuala = str_replace(",", "", $this->request->getPost('harga_jual_a'));
            $hargajualb = str_replace(",", "", $this->request->getPost('harga_jual_b'));
            $stok = str_replace(",", "", $this->request->getPost('stok'));
            $data = [
                'kode_produk' => $this->request->getPost('kode_produk'),
                'nama_produk' => $this->request->getPost('nama_produk'),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'id_satuan' => $this->request->getPost('id_satuan'),
                'harga_beli' => $hargabeli,
                'harga_jual' => $hargajual,
                'harga_jual_a' => $hargajuala,
                'harga_jual_b' => $hargajualb,
                'stok' => $stok,
            ];
            $this->ProdukModel->InsertData($data);
            session()->setFlashdata('pesan', 'Data berhasil disimpan!');
            return redirect()->to(base_url('produk'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Produk'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function UpdateData($id_produk)
    {
        if ($this->validate([
            'id_satuan' => [
                'label' => 'Satuan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} belum dipilih!',
                ]
            ],
        ])) {
            $hargabeli = str_replace(",", "", $this->request->getPost('harga_beli'));
            $hargajual = str_replace(",", "", $this->request->getPost('harga_jual'));
            $hargajuala = str_replace(",", "", $this->request->getPost('harga_jual_a'));
            $hargajualb = str_replace(",", "", $this->request->getPost('harga_jual_b'));
            $stok = str_replace(",", "", $this->request->getPost('stok'));
            $data = [
                'id_produk' => $id_produk,
                'nama_produk' => $this->request->getPost('nama_produk'),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'id_satuan' => $this->request->getPost('id_satuan'),
                'harga_beli' => $hargabeli,
                'harga_jual' => $hargajual,
                'harga_jual_a' => $hargajuala,
                'harga_jual_b' => $hargajualb,
                'stok' => $stok,
            ];
            $this->ProdukModel->UpdateData($data);
            session()->setFlashdata('pesan', 'Data berhasil diubah!');
            return redirect()->to(base_url('produk'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Produk'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function DeleteData($id_produk)
    {
        // Menghapus data satuan
        $data = [
            'id_produk' => $id_produk
        ];
        $this->ProdukModel->DeleteData($data);

        session()->setFlashdata('pesan', 'Data berhasil dihapus!');

        return redirect()->to('Produk');
    }
}
