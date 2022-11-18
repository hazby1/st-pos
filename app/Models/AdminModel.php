<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    public function DetailData()
    {
        return $this->db->table('t_setting')
            ->where('id_setting', ' 1')
            ->get()
            ->getRowArray();
    }

    public function UpdateData($data)
    {
        $this->db->table('t_setting')
            ->where('id_setting', $data['id_setting'])
            ->update($data);
    }

    public function Grafik()
    {
        # code...
        return $this->db->table('t_rinci')
            ->join('t_jual', 't_jual.no_faktur=t_rinci.no_faktur')
            ->where('month(t_jual.tgl_jual)', date('m'))
            ->where('year(t_jual.tgl_jual)', date('Y'))
            ->select('t_jual.tgl_jual')
            ->groupBy('t_jual.tgl_jual')
            ->selectSum('t_rinci.total_harga')
            ->selectSum('t_rinci.untung')
            ->get()->getResultArray();
    }
}
