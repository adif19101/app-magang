<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Surat;

class SuratMhs extends BaseController
{
    public function __construct() {
        $this->mSurat = new Surat();
    }
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

    public function create()
    {
        $dataIn = $this->request->getPost();

        $dataIn += [
            'user_id' => auth()->id(),
            'status' => 'Pending',
        ];
        
        if ($this->mSurat->createSurat($dataIn)) {
            $response = [
                'status' => 'success',
                'message' => 'Lowongan berhasil ditambahkan',
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Lowongan gagal ditambahkan',
            ];
        }

        return $this->response->setJSON($response);
    }
}
