<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\KategoriModel;
use App\Models\SatuanModel;
use App\Models\AdminModel;

class Laporan extends BaseController
{

    public function __construct()
    {
        $this->ProdukModel = new ProdukModel();
        $this->KategoriModel = new KategoriModel();
        $this->SatuanModel = new SatuanModel();
        $this->AdminModel = new AdminModel();
    }

    public function CetakProduk()
    {
        //
        $data = [
            'judul' => 'Laporan Data Produk',
            'subjudul' => 'Satuan',
            'menu' => 'laporan',
            'submenu' => 'laporan',
            'page' => 'laporan/v_cetak_lap_produk',
            'produk' => $this->ProdukModel->AllData(),
            'web' => $this->AdminModel->DetailData(),
        ];

        return view('laporan/v_template_cetak_laporan', $data);
    }
}
