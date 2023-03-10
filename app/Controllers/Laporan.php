<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\AdminModel;
use App\Models\LaporanModel;
use App\Models\PenjualanModel;
use App\Models\PelangganModel;

class Laporan extends BaseController
{

    public function Coba()
    {
        # code...
        $no_faktur = 202301310001;
        $data = [
            'pelanggan' => $this->LaporanModel->Pelanggan($no_faktur)
        ];
        echo dd($data);
    }

    public function __construct()
    {
        $this->ProdukModel = new ProdukModel();
        $this->AdminModel = new AdminModel();
        $this->LaporanModel = new LaporanModel();
        $this->PenjualanModel = new PenjualanModel();
        $this->PelangganModel = new PelangganModel();
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

    // Return barang penjualan
    public function AllReturn()
    {
        # code...
        $data = [
            'judul' => 'Laporan',
            'subjudul' => 'Semua Return Produk Penjualan',
            'menu' => 'laporan',
            'submenu' => 'allreturn',
            'page' => 'laporan/v_all_return',
            'allreturn' => $this->LaporanModel->AllReturn(),
        ];

        return view('v_template', $data);
    }

    public function AllTransaksi()
    {
        # code...
        $data = [
            'judul' => 'Laporan',
            'subjudul' => 'Semua Transaksi',
            'menu' => 'laporan',
            'submenu' => 'alltransaksi',
            'page' => 'laporan/v_all_transaksi',
            'alltransaksi' => $this->LaporanModel->AllTransaksi(),
        ];

        return view('v_template', $data);

        // echo dd($data);

        // $data = [
        //     'judul' => 'Master Data',
        //     'subjudul' => 'Satuan',
        //     'menu' => 'masterdata',
        //     'submenu' => 'satuan',
        //     'page' => 'v_satuan',
        //     'satuan' => $this->SatuanModel->AllData()
        // ];

        // return view('v_template', $data);
    }

    public function Transaksi()
    {
        # code...
        $data = [
            'judul' => 'Laporan',
            'subjudul' => 'Cari Transaksi',
            'menu' => 'laporan',
            'submenu' => 'transaksi',
            'page' => 'laporan/v_transaksi',
            'web' => $this->AdminModel->DetailData(),
        ];
        return view('v_template', $data);
    }

    public function Pembelian()
    {
        # code...
        $data = [
            'judul' => 'Laporan',
            'subjudul' => 'Pembelian',
            'menu' => 'laporan',
            'submenu' => 'pembelian',
            'page' => 'laporan/v_pembelian',
            'web' => $this->AdminModel->DetailData(),
            'pembelian' => $this->LaporanModel->Pembelian(),
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
            'datatransaksi' => $this->LaporanModel->DataTransaksi($no_faktur),
            'web' => $this->AdminModel->DetailData(),
            'no_faktur' => $no_faktur,
            'pelanggan' => $this->LaporanModel->Pelanggan($no_faktur)
        ];

        $response = [
            'data' => view('laporan/v_t_transaksi', $data)
        ];

        echo json_encode($response);
    }

    public function ViewPembelian()
    {
        # code...
        $nota_beli = $this->request->getPost('nota_beli');
        $data = [
            'judul' => 'Laporan',
            'subjudul' => 'Pembelian',
            'datapembelian' => $this->LaporanModel->DataPembelian($nota_beli),
            'web' => $this->AdminModel->DetailData(),
            'nota_beli' => $nota_beli,
            'pelanggan' => $this->LaporanModel->Supplier($nota_beli)
        ];

        $response = [
            'data' => view('laporan/v_t_pembelian', $data)
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
            'pelanggan' => $this->LaporanModel->Pelanggan($no_faktur)
        ];
        return view('laporan/v_template_cetak_nota', $data);
    }

    public function CetakPembelian($nota_beli)
    {
        # code...
        $data = [
            'judul' => 'Pembelian',
            'page' => 'laporan/v_cetak_pembelian',
            'datatransaksi' => $this->LaporanModel->DataPembelian($nota_beli),
            'web' => $this->AdminModel->DetailData(),
            'nota_beli' => $nota_beli,
            'supplier' => $this->LaporanModel->Supplier($nota_beli)
        ];
        return view('laporan/v_template_cetak_pembelian', $data);
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
