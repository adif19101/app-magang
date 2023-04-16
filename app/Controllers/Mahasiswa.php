<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Lowongan;

class Mahasiswa extends BaseController
{
    public function __construct() {
        $this->mLowongan = new Lowongan();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard - Mahasiswa',
            'subtitle' => 'Dashboard',
            // 'breadcrumbs' => [
            //     [
            //         'crumb' => 'Dashboard'
            //     ],
            // ],
        ];

        $data['lowongan'] = $this->mLowongan->orderBy('id', 'DESC')->findAll(3);

        return view('mahasiswa/index', $data);
    }
}
