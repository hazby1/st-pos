<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\Home;
use App\Models\AdminModel;

class Admin extends BaseController
{

    public function __construct()
    {
        $this->AdminModel = new AdminModel();
        // $this->Home = new Home();
        // $this->Home->CekLogin();
    }

    public function index()
    {
        //
        $data = [
            'judul' => 'Dashboard',
            'subjudul' => '',
            'menu' => 'dashboard',
            'submenu' => '',
            'page' => 'v_admin',
            'grafik' => $this->AdminModel->Grafik(),
            'pendapatanhari' => $this->AdminModel->PendapatanHariIni(),
            'pendapatanbulan' => $this->AdminModel->PendapatanBulanIni(),
            'pendapatantahun' => $this->AdminModel->PendapatanTahunIni(),
            'produk' => $this->AdminModel->TotalProduk(),
            'satuan' => $this->AdminModel->TotalSatuan(),
            'kategori' => $this->AdminModel->TotalKategori(),
            'user' => $this->AdminModel->TotalUser(),
            'pelanggan' => $this->AdminModel->TotalPelanggan(),
            'supplier' => $this->AdminModel->TotalSupplier(),
        ];
        return view('v_template', $data);
    }

    public function Setting()
    {
        //
        $data = [
            'judul' => 'Setting',
            'subjudul' => 'Setting',
            'menu' => 'setting',
            'submenu' => '',
            'page' => 'v_setting',
            'setting' => $this->AdminModel->DetailData()
        ];
        return view('v_template', $data);
    }

    public function UpdateSetting()
    {
        $data = [
            'id_setting' => '1',
            'nama_toko' => $this->request->getPost('nama_toko'),
            'slogan' => $this->request->getPost('slogan'),
            'alamat' => $this->request->getPost('alamat'),
            'no_telepon' => $this->request->getPost('no_telepon'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ];
        $this->AdminModel->UpdateData($data);
        session()->setFlashdata('pesan', 'Data berhasil diubah!');
        return redirect()->to('admin/setting');
    }

    public function Cek()
    {
        # code...

        echo dd($this->AdminModel->PendapatanhariIni());
    }
}
