<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JasaModel;
use App\Models\KategoriModel;
use App\Models\SatuanModel;

class Jasa extends BaseController
{
    public function __construct()
    {
        $this->JasaModel = new JasaModel();
        $this->KategoriModel = new KategoriModel();
        $this->SatuanModel = new SatuanModel();
    }

    public function index()
    {
        //
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Jasa',
            'menu' => 'masterdata',
            'submenu' => 'jasa',
            'page' => 'v_jasa',
            'jasa' => $this->JasaModel->AllData(),
            'kategori' => $this->KategoriModel->AllData(),
            'satuan' => $this->SatuanModel->AllData(),
        ];
        return view('v_template', $data);
    }

    public function InsertData()
    {
        if ($this->validate([
            'kode_jasa' => [
                'label' => 'Kode Jasa',
                'rules' => 'is_unique[t_produk.kode_jasa]',
                'errors' => [
                    'is_unique' => '{field} sudah ada, masukkan kode lain!',
                ]
            ],
        ])) {
            $hargamodal = str_replace(",", "", $this->request->getPost('harga_modal'));
            $hargajual = str_replace(",", "", $this->request->getPost('harga_jual'));
            $stok = str_replace(",", "", $this->request->getPost('stok'));
            $data = [
                'kode_jasa' => $this->request->getPost('kode_jasa'),
                'nama_jasa' => $this->request->getPost('nama_jasa'),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'id_satuan' => $this->request->getPost('id_satuan'),
                'harga_modal' => $hargamodal,
                'harga_jual' => $hargajual,
                'stok' => $stok,
            ];
            $this->JasaModel->InsertData($data);
            session()->setFlashdata('pesan', 'Data berhasil disimpan!');
            return redirect()->to(base_url('jasa'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Jasa'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function UpdateData($id_jasa)
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
            $hargamodal = str_replace(",", "", $this->request->getPost('harga_modal'));
            $hargajual = str_replace(",", "", $this->request->getPost('harga_jual'));
            $stok = str_replace(",", "", $this->request->getPost('stok'));
            $data = [
                'id_jasa' => $id_jasa,
                'nama_jasa' => $this->request->getPost('nama_jasa'),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'id_satuan' => $this->request->getPost('id_satuan'),
                'harga_modal' => $hargamodal,
                'harga_jual' => $hargajual,
                'stok' => $stok,
            ];
            $this->JasaModel->UpdateData($data);
            session()->setFlashdata('pesan', 'Data berhasil diubah!');
            return redirect()->to(base_url('jasa'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Jasa'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function DeleteData($id_jasa)
    {
        // Menghapus data satuan
        $data = [
            'id_jasa' => $id_jasa
        ];
        $this->JasaModel->DeleteData($data);

        session()->setFlashdata('pesan', 'Data berhasil dihapus!');

        return redirect()->to('Jasa');
    }
}
