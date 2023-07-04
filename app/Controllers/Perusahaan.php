<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Perusahaan extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard - Perusahaan',
            'subtitle' => 'Dashboard',
        ];

        // TODO ganti jd statistik 

        return view('perusahaan/index', $data);
    }
}
