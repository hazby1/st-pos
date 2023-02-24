<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PelangganModel;

class Pelanggan extends BaseController
{
    public function __construct()
    {
        $this->PelangganModel = new PelangganModel();
    }

    public function index()
    {
        //
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Pelanggan',
            'menu' => 'masterdata',
            'submenu' => 'pelanggan',
            'page' => 'v_pelanggan',
            'pelanggan' => $this->PelangganModel->AllPelanggan()
        ];
        return view('v_template', $data);
    }

    public function InsertData()
    {
        // Menambah data Pelanggan
        $data = [
            'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
            'level' => $this->request->getPost('level'),
        ];

        $this->PelangganModel->InsertData($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!');

        return redirect()->to('pelanggan');
    }

    public function UpdateData($id_pelanggan)
    {
        // Mengedit data pelanggan
        $data = [
            'id_pelanggan' => $id_pelanggan,
            'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
            'level' => $this->request->getPost('level'),
        ];

        $this->PelangganModel->UpdateData($data);

        session()->setFlashdata('pesan', 'Data berhasil diubah!');

        return redirect()->to('pelanggan');
    }

    public function DeleteData($id_pelanggan)
    {
        // Menghapus data pelanggan
        $data = [
            'id_pelanggan' => $id_pelanggan,
            'hapus' => 'hapus'
        ];
        $this->PelangganModel->DeleteData($data);

        session()->setFlashdata('pesan', 'Data berhasil dihapus!');

        return redirect()->to('Pelanggan');
    }
}
