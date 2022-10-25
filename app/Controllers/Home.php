<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Router\Exceptions\RedirectException;

class Home extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'judul' => 'judul',
        ];
        return view('v_login', $data);
    }

    public function CekLogin()
    {
        if ($this->validate([
            'email' => [
                'label' => 'Email',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong!'
                ]
            ]
        ])) {
            $email = $this->request->getPost('email');
            $password = sha1($this->request->getPost('password'));
            $cek_login = $this->UserModel->LoginUser($email, $password);
            if ($cek_login) {
                // Jika login berhasil
                session()->set('id_user', $cek_login['id_user']);
                session()->set('nama_user', $cek_login['nama_user']);
                session()->set('level', $cek_login['level']);
                if ($cek_login['level'] == 'admin') {
                    return redirect()->to(base_url('Admin'));
                } elseif ($cek_login['level'] == 'kasir') {
                    return redirect()->to(base_url('penjualan'));
                } else {
                    return redirect()->to(base_url('servis'));
                }
            } else {
                // Jika gagal login
                session()->setFlashdata('gagal', 'Email atau Password salah!');
                return redirect()->to(base_url('Home'));
            }
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Home'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function Logout()
    {
        session()->remove('id_user');
        session()->remove('nama_user');
        session()->remove('level');
        session()->setFlashdata('pesan', 'Anda sudah logout!');
        return redirect()->to(base_url('Home'));
    }
}
