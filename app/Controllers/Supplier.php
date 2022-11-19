<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SupplierModel;

class Supplier extends BaseController
{
    public function __construct()
    {
        $this->SupplierModel = new SupplierModel();
    }

    public function index()
    {
        //
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Supplier',
            'menu' => 'masterdata',
            'submenu' => 'supplier',
            'page' => 'v_supplier',
            'supplier' => $this->SupplierModel->AllData()
        ];
        return view('v_template', $data);
    }

    public function InsertData()
    {
        // Menambah data Supplier
        $data = [
            'nama_supplier' => $this->request->getPost('nama_supplier'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
        ];

        $this->SupplierModel->InsertData($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!');

        return redirect()->to('supplier');
    }

    public function UpdateData($id_supplier)
    {
        // Mengedit data supplier
        $data = [
            'id_supplier' => $id_supplier,
            'nama_supplier' => $this->request->getPost('nama_supplier'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp')
        ];

        $this->SupplierModel->UpdateData($data);

        session()->setFlashdata('pesan', 'Data berhasil diubah!');

        return redirect()->to('supplier');
    }

    public function DeleteData($id_supplier)
    {
        // Menghapus data supplier
        $data = [
            'id_supplier' => $id_supplier
        ];
        $this->SupplierModel->DeleteData($data);

        session()->setFlashdata('pesan', 'Data berhasil dihapus!');

        return redirect()->to('Supplier');
    }
}
