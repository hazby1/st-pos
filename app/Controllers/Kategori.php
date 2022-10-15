<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Kategori extends BaseController
{
    public function index()
    {
        //
        $data = [
            'page' => 'v_kategori'
        ];
        return view('v_template', $data);
    }
}
