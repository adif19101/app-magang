<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SuratMhs extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Surat',
            'subtitle' => 'Surat',
            'breadcrumbs' => [
                [
                    'url' => base_url('mahasiswa'), 
                    'crumb' => 'Dashboard'
                ],
                [
                    'crumb' => 'Surat'
                ],
            ],
        ];

        return view('mahasiswa/surat_mhs', $data);
    }

    public function new()
    {
        $data = [
            'title' => 'Pengajuan Surat',
            'subtitle' => 'Pengajuan Surat',
            'breadcrumbs' => [
                [
                    'url' => base_url('mahasiswa'), 
                    'crumb' => 'Dashboard'
                ],
                [
                    'url' => base_url('mahasiswa/surat'), 
                    'crumb' => 'Surat'
                ],
                [
                    'crumb' => 'Pengajuan Surat'
                ],
            ],
        ];
        return view('mahasiswa/surat_mhs_new', $data);
    }
}
