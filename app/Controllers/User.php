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
            'password' => md5($this->request->getPost('password')),
            'level' => $this->request->getPost('level')
        ];

        $this->UserModel->InsertData($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!');

        return redirect()->to('user');
    }
}
