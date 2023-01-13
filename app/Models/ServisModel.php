<?php

namespace App\Models;

use CodeIgniter\Model;

class ServisModel extends Model
{

    public function NoServis()
    {
        $tgl = date('Ymd');
        $query = $this->db->query("SELECT MAX(RIGHT(no_servis,4)) as no_urut FROM t_servis WHERE DATE(tgl_masuk)='$tgl'");
        $hasil = $query->getRowArray();

        if ($hasil['no_urut'] > 0) {
            $tmp = $hasil['no_urut'] + 1;
            $kd = sprintf("%04s", $tmp);
        } else {
            $kd = "0001";
        }

        $no_servis = 'SRV' . date('Ymd') . $kd;
        return $no_servis;
    }

    public function AllData()
    {
        return $this->db->table('t_servis')
            ->join('t_kategori', 't_kategori.id_kategori=t_servis.kategori')
            ->join('t_user', 't_user.id_user=t_servis.penerima')
            ->join('t_jasa', 't_jasa.id_jasa=t_servis.pemilik')
            ->join('t_pelanggan', 't_pelanggan.id_pelanggan=t_servis.pemilik')
            ->where('status', 'proses')
            ->get()
            ->getResultArray();
    }

    public function BisaDiambil()
    {
        return $this->db->table('t_servis')
            ->join('t_kategori', 't_kategori.id_kategori=t_servis.kategori')
            ->join('t_user', 't_user.id_user=t_servis.penerima')
            ->join('t_jasa', 't_jasa.id_jasa=t_servis.pemilik')
            ->join('t_pelanggan', 't_pelanggan.id_pelanggan=t_servis.pemilik')
            ->where('status', 'bisa diambil')
            ->get()
            ->getResultArray();
    }

    public function SudahDiambil()
    {
        return $this->db->table('t_servis')
            ->join('t_kategori', 't_kategori.id_kategori=t_servis.kategori')
            ->join('t_user', 't_user.id_user=t_servis.penerima')
            ->join('t_pelanggan', 't_pelanggan.id_pelanggan=t_servis.pemilik')
            ->join('t_jasa', 't_jasa.id_jasa=t_servis.pemilik')
            ->where('status', 'diambil')
            ->get()
            ->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('t_servis')->insert($data);
    }

    public function KeBisaDiambil($data)
    {
        # code...
        $this->db->table('t_servis')
            ->where('id_servis', $data['id_servis'])
            ->update($data);
    }

    public function KeSudahDiambil($data)
    {
        # code...
        $this->db->table('t_servis')
            ->where('id_servis', $data['id_servis'])
            ->update($data);
    }
}
