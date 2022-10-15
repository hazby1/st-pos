<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Satuan extends BaseController
{
    public function index()
    {
        //
        $data = [
            'page' => 'v_satuan'
        ];
        return view('v_template', $data);
    }
}
