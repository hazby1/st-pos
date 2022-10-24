<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Penjualan extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Penjualan'
        ];
        return view('v_penjualan', $data);
    }
}
