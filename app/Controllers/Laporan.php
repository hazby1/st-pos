<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\AdminModel;
use App\Models\LaporanModel;

class Laporan extends BaseController
{

    public function __construct()
    {
        $this->ProdukModel = new ProdukModel();
        $this->AdminModel = new AdminModel();
        $this->LaporanModel = new LaporanModel();
    }

    public function CetakProduk()
    {
        //
        $data = [
            'judul' => 'Laporan Data Produk',
            'page' => 'laporan/v_cetak_lap_produk',
            'produk' => $this->ProdukModel->AllData(),
            'web' => $this->AdminModel->DetailData(),
        ];

        return view('laporan/v_template_cetak_laporan', $data);
    }

    public function LaporanHarian()
    {
        # code...
        $data = [
            'judul' => 'Laporan',
            'subjudul' => 'Laporan Harian',
            'menu' => 'laporan',
            'submenu' => 'harian',
            'page' => 'laporan/v_harian',
            'web' => $this->AdminModel->DetailData(),
        ];
        return view('v_template', $data);
    }

    public function ViewLaporanHarian()
    {
        $tgl = $this->request->getPost('tgl');
        # code...
        $data = [
            'subjudul' => 'Laporan Penjualan Harian',
            'judul' => 'Laporan',
            'dataharian' => $this->LaporanModel->DataHarian($tgl),
            'web' => $this->AdminModel->DetailData(),
            'tgl' => $tgl,
        ];

        $response = [
            'data' => view('laporan/v_t_harian', $data)
        ];

        echo json_encode($response);

        // echo dd($this->LaporanModel->DataHarian($tgl));
    }
}
