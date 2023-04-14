<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Lowongan;

class LowonganMhs extends BaseController
{
    public function __construct() {
        $this->mLowongan = new Lowongan();
    }

    public function index()
    {
        $data = [
            'title' => 'Lowongan Magang',
            'subtitle' => 'Lowongan Magang',
            'breadcrumbs' => [
                [
                    'url' => base_url('mahasiswa'), 
                    'crumb' => 'Dashboard'
                ],
                [
                    'crumb' => 'Lowongan Magang'
                ],
            ],
        ];

        $data['lowongan'] = $this->mLowongan->paginate(2);
        $data['pager'] = $this->mLowongan->pager;

        return view('mahasiswa/lowongan_mhs', $data);
    }

    public function new()
    {
        $data = [
            'title' => 'Lowongan Magang',
            'subtitle' => 'Tambah Lowongan Magang',
            'breadcrumbs' => [
                [
                    'url' => base_url('mahasiswa'), 
                    'crumb' => 'Dashboard'
                ],
                [
                    'url' => base_url('mahasiswa/lowongan'), 
                    'crumb' => 'Lowongan Magang'
                ],
                [
                    'crumb' => 'Tambah Lowongan Magang'
                ],
            ],
        ];
        return view('mahasiswa/lowongan_mhs_new', $data);
    }

    public function show(int $id)
    {
        
    }

    public function edit(int $id)
    {
        
    }

    public function create()
    {
        $dataIn = $this->request->getPost();

        $dataIn += ['user_id' => auth()->id()];
        
        if ($this->mLowongan->insert($dataIn, false)) {
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

    public function update(int $id)
    {
        
    }
    
    public function delete(int $id)
    {
        
    }
}
