<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\AdminModel;
use App\Models\LaporanModel;
use App\Models\PenjualanModel;

class Laporan extends BaseController
{

    public function __construct()
    {
        $this->ProdukModel = new ProdukModel();
        $this->AdminModel = new AdminModel();
        $this->LaporanModel = new LaporanModel();
        $this->PenjualanModel = new PenjualanModel();
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

    public function tgl_indo($tgl)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tgl);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }

    public function Transaksi()
    {
        # code...
        $data = [
            'judul' => 'Laporan',
            'subjudul' => 'Transaksi',
            'menu' => 'laporan',
            'submenu' => 'transaksi',
            'page' => 'laporan/v_transaksi',
            'web' => $this->AdminModel->DetailData(),
        ];
        return view('v_template', $data);
    }

    public function ViewTransaksi()
    {
        # code...
        $no_faktur = $this->request->getPost('no_faktur');

        $data = [
            'judul' => 'Laporan',
            'subjudul' => 'Transaksi',
            'datatransaksi' =>
            $this->LaporanModel->DataTransaksi($no_faktur),
            'web' => $this->AdminModel->DetailData(),
            'no_faktur' => $no_faktur
        ];

        $response = [
            'data' => view('laporan/v_t_transaksi', $data)
        ];

        echo json_encode($response);
    }

    public function CetakTransaksi($no_faktur)
    {
        # code...
        $data = [
            'judul' => 'Transaksi',
            'page' => 'laporan/v_cetak_transaksi',
            'datatransaksi' => $this->LaporanModel->DataTransaksi($no_faktur),
            'web' => $this->AdminModel->DetailData(),
            'no_faktur' => $no_faktur,
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
            'tgl' => $this->tgl_indo($tgl),
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
            'tgl' => $this->tgl_indo($tgl),
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

    public function LaporanTahunan()
    {
        # code...
        $data = [
            'judul' => 'Laporan',
            'subjudul' => 'Laporan Tahunan',
            'menu' => 'laporan',
            'submenu' => 'tahunan',
            'page' => 'laporan/v_tahunan',
            'web' => $this->AdminModel->DetailData(),
        ];
        return view('v_template', $data);
    }

    public function ViewLaporanTahunan()
    {
        $tahun = $this->request->getPost('tahun');
        // $tahun = 2022;

        $data = [
            'judul' => 'Laporan',
            'subjudul' => 'Laporan Penjualan Tahunan',
            'datatahunan' => $this->LaporanModel->DataTahunan($tahun),
            'web' => $this->AdminModel->DetailData(),
            'tahun' => $tahun,
        ];

        $response = [
            'data' => view('laporan/v_t_tahunan', $data)
        ];

        echo json_encode($response);

        // echo dd($this->LaporanModel->DataTahunan($tahun));
    }

    public function CetakLaporanTahunan($tahun)
    {
        # code...
        $data = [
            'judul' => 'Laporan Penjualan Tahunan',
            'page' => 'laporan/v_cetak_lap_tahunan',
            'datatahunan' => $this->LaporanModel->DataTahunan($tahun),
            'web' => $this->AdminModel->DetailData(),
            'tahun' => $tahun,
        ];
        return view('laporan/v_template_cetak_laporan', $data);
    }
}
