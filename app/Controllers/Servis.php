<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ServisModel;
use App\Models\KategoriModel;
use App\Models\UserModel;
use App\Models\PelangganModel;
use App\Models\JasaModel;

class Servis extends BaseController
{

    public function __construct()
    {
        $this->ServisModel = new ServisModel();
        $this->KategoriModel = new KategoriModel();
        $this->UserModel = new UserModel();
        $this->PelangganModel = new PelangganModel();
        $this->JasaModel = new JasaModel();
    }

    public function index()
    {
        $data = [
            'judul' => 'Servis',
            'subjudul' => 'Proses',
            'menu' => 'servis',
            'submenu' => 'proses',
            'page' => 'v_servis',
            'servis' => $this->ServisModel->AllData(),
            'no_servis' => $this->ServisModel->NoServis(),
            'kategori' => $this->KategoriModel->AllData(),
            'pelanggan' => $this->PelangganModel->AllData(),
            'jasa' => $this->JasaModel->AllData(),
            'user' => $this->UserModel->AllData(),
        ];
        return view('v_template', $data);
    }

    public function BisaDiambil()
    {
        $data = [
            'judul' => 'Servis',
            'subjudul' => 'Bisa Diambil',
            'menu' => 'servis',
            'submenu' => 'bisa diambil',
            'page' => 'v_bisadiambil',
            'servis' => $this->ServisModel->BisaDiambil(),
            'no_servis' => $this->ServisModel->NoServis(),
            'kategori' => $this->KategoriModel->AllData(),
            'jasa' => $this->JasaModel->AllData(),
            'pelanggan' => $this->PelangganModel->AllData(),
            'user' => $this->UserModel->AllData(),
        ];
        return view('v_template', $data);
    }

    public function SudahDiambil()
    {
        $data = [
            'judul' => 'Servis',
            'subjudul' => 'Sudah Diambil',
            'menu' => 'servis',
            'submenu' => 'sudah diambil',
            'page' => 'v_sudahdiambil',
            'servis' => $this->ServisModel->SudahDiambil(),
            'no_servis' => $this->ServisModel->NoServis(),
            'kategori' => $this->KategoriModel->AllData(),
            'jasa' => $this->JasaModel->AllData(),
            'pelanggan' => $this->PelangganModel->AllData(),
            'user' => $this->UserModel->AllData(),
        ];
        return view('v_template', $data);
    }

    public function InsertData()
    {
        $no_servis = $this->ServisModel->NoServis();
        // Menambah data Servis
        $data = [
            'no_servis' => $no_servis,
            'tgl_masuk' => date('Y-m-d'),
            'pemilik' => $this->request->getPost('pemilik'),
            'penerima' => $this->request->getPost('penerima'),
            'kategori' => $this->request->getPost('kategori'),
            'merk' => $this->request->getPost('merk'),
            'type' => $this->request->getPost('type'),
            'sn' => $this->request->getPost('sn'),
            'kerusakan' => $this->request->getPost('kerusakan'),
            'kelengkapan' => $this->request->getPost('kelengkapan'),
            'status' => $this->request->getPost('status'),
        ];

        $this->ServisModel->InsertData($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!');

        return redirect()->to('servis');
    }

    public function KeBisaDiambil($id_servis)
    {
        // Bisa Diambil
        $data = [
            'id_servis' => $id_servis,
            'status' => "bisa diambil",
            'biaya' => $this->request->getPost('biaya'),
            'penanganan' => $this->request->getPost('penanganan'),
        ];

        $this->ServisModel->KeBisaDiambil($data);

        session()->setFlashdata('pesan', 'Data berhasil diubah!');

        return redirect()->to('Servis/BisaDiambil');
    }

    public function KeSudahDiambil($id_servis)
    {
        // Sudah Diambil
        $data = [
            'id_servis' => $id_servis,
            'tgl_keluar' => date('Y-m-d'),
            'status' => "diambil",
        ];

        $this->ServisModel->KeSudahDiambil($data);

        session()->setFlashdata('pesan', 'Data berhasil diubah!');

        return redirect()->to('Servis/SudahDiambil');
    }
}
