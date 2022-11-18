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

    public function CetakLaporanHarian($tgl)
    {
        # code...
        $data = [
            'judul' => 'Laporan Penjualan Harian',
            'page' => 'laporan/v_cetak_lap_harian',
            'dataharian' => $this->LaporanModel->DataHarian($tgl),
            'web' => $this->AdminModel->DetailData(),
            'tgl' => $tgl,
        ];
        return view('laporan/v_template_cetak_laporan', $data);
    }

    public function LaporanBulanan()
    {
        # code...
        $data = [
            'judul' => 'Laporan',
            'subjudul' => 'Laporan Bulanan',
            'menu' => 'laporan',
            'submenu' => 'bulanan',
            'page' => 'laporan/v_bulanan',
            'web' => $this->AdminModel->DetailData(),
        ];
        return view('v_template', $data);
    }

    public function ViewLaporanBulanan()
    {
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');

        $data = [
            'judul' => 'Laporan',
            'subjudul' => 'Laporan Penjualan Bulanan',
            'databulanan' => $this->LaporanModel->Databulanan($bulan, $tahun),
            'web' => $this->AdminModel->DetailData(),
            'bulan' => $bulan,
            'tahun' => $tahun,
        ];

        $response = [
            'data' => view('laporan/v_t_bulanan', $data)
        ];

        echo json_encode($response);

        // echo dd($this->LaporanModel->DataBulanan($bulan, $tahun));
    }

    public function CetakLaporanBulanan($bulan, $tahun)
    {
        # code...
        $data = [
            'judul' => 'Laporan Penjualan Bulanan',
            'page' => 'laporan/v_cetak_lap_bulanan',
            'databulanan' => $this->LaporanModel->DataBulanan($bulan, $tahun),
            'web' => $this->AdminModel->DetailData(),
            'bulan' => $bulan,
            'tahun' => $tahun,
        ];
        return view('laporan/v_template_cetak_laporan', $data);
    }
}
