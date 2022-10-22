<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        //
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'User',
            'menu' => 'masterdata',
            'submenu' => 'user',
            'page' => 'v_user',
            'user' => $this->UserModel->AllData()
        ];
        return view('v_template', $data);
    }

    public function InsertData()
    {
        // Menambah data user
        $data = [
            'nama_user' => $this->request->getPost('nama_user'),
            'email' => $this->request->getPost('email'),
            'password' => sha1($this->request->getPost('password')),
            'level' => $this->request->getPost('level')
        ];

        $this->UserModel->InsertData($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!');

        return redirect()->to('user');
    }

    public function UpdateData($id_user)
    {
        // Mengedit data user
        $data = [
            'id_user' => $id_user,
            'nama_user' => $this->request->getPost('nama_user'),
            'email' => $this->request->getPost('email'),
            'level' => $this->request->getPost('level')
        ];

        $this->UserModel->UpdateData($data);

        session()->setFlashdata('pesan', 'Data berhasil diubah!');

        return redirect()->to('user');
    }

    public function DeleteData($id_user)
    {
        // Menghapus data user
        $data = [
            'id_user' => $id_user
        ];
        $this->UserModel->DeleteData($data);

        session()->setFlashdata('pesan', 'Data berhasil dihapus!');

        return redirect()->to('User');
    }
}
