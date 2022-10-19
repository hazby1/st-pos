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
}
