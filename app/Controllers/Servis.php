<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Servis extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Servis'
        ];
        return view('v_servis', $data);
    }
}
