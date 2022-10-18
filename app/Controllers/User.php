<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class User extends BaseController
{
    public function index()
    {
        //
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'user',
            'menu' => 'masterdata',
            'submenu' => 'user',
            'page' => 'v_user'
        ];
        return view('v_template', $data);
    }
}
