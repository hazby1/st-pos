<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KategoriModel;

class Kategori extends BaseController
{
    public function __construct()
    {
        $this->KategoriModel = new KategoriModel();
    }
    public function index()
    {
        //
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Kategori',
            'menu' => 'masterdata',
            'submenu' => 'kategori',
            'page' => 'v_kategori',
            'kategori' => $this->KategoriModel->AllData()
        ];
        return view('v_template', $data);
    }

    public function InsertData()
    {
        // Menambah data kategori
        $data = ['nama_kategori' => $this->request->getPost('nama_kategori')];

        $this->KategoriModel->InsertData($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!');

        return redirect()->to('kategori');
    }

    public function UpdateData($id_kategori)
    {
        // Mengedit data kategori
        $data = [
            'id_kategori' => $id_kategori,
            'nama_kategori' => $this->request->getPost('nama_kategori'),
        ];

        $this->KategoriModel->UpdateData($data);

        session()->setFlashdata('pesan', 'Data berhasil diubah!');

        return redirect()->to('Kategori');
    }

    public function DeleteData($id_kategori)
    {
        // Menghapus data kategori
        $data = [
            'id_kategori' => $id_kategori
        ];
        $this->KategoriModel->DeleteData($data);

        session()->setFlashdata('pesan', 'Data berhasil dihapus!');

        return redirect()->to('Kategori');
    }
}
