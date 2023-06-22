<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Verifikator extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard - Verifikator',
            'subtitle' => 'Dashboard',
        ];

        // TODO ganti jd statistik 

        return view('verifikator/index', $data);
    }
}
