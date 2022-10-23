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
}
