<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenjualanModel;

class Penjualan extends BaseController
{
    public function __construct()
    {
        $this->PenjualanModel = new PenjualanModel();
    }

    public function index()
    {
        $data = [
            'judul' => 'Penjualan',
            'no_faktur' => $this->PenjualanModel->NoFaktur(),
        ];
        return view('v_penjualan', $data);
    }
}
