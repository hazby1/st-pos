<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SatuanModel;

class Satuan extends BaseController
{
    public function __construct()
    {
        $this->SatuanModel = new SatuanModel();
    }

    public function index()
    {
        //
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Satuan',
            'menu' => 'masterdata',
            'submenu' => 'satuan',
            'page' => 'v_satuan',
            'satuan' => $this->SatuanModel->AllData()
        ];

        return view('v_template', $data);
    }

    public function InsertData()
    {
        // Menambah data satuan
        $data = ['nama_satuan' => $this->request->getPost('nama_satuan')];

        $this->SatuanModel->InsertData($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!');

        return redirect()->to('satuan');
    }

    public function UpdateData($id_satuan)
    {
        // Mengedit data satuan
        $data = [
            'id_satuan' => $id_satuan,
            'nama_satuan' => $this->request->getPost('nama_satuan'),
        ];

        $this->SatuanModel->UpdateData($data);

        session()->setFlashdata('pesan', 'Data berhasil diubah!');

        return redirect()->to('Satuan');
    }

    public function DeleteData($id_satuan)
    {
        // Menghapus data satuan
        $data = [
            'id_satuan' => $id_satuan
        ];
        $this->SatuanModel->DeleteData($data);

        session()->setFlashdata('pesan', 'Data berhasil dihapus!');

        return redirect()->to('Satuan');
    }
}
