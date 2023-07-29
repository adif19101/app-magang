<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Lowongan;

class LowonganMhs extends BaseController
{
    public function __construct() {
        $this->mLowongan = new Lowongan();
        $this->mPelamar = new \App\Models\Pelamar();
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
                    'crumb' => 'Lowongan'
                ],
            ],
        ];

        $filter = $this->request->getGet();
        
        $data['lowongan'] = $this->mLowongan->getLowongan($filter);
        $data['filter'] = $filter;

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
                    'crumb' => 'Lowongan'
                ],
                [
                    'crumb' => 'Tambah Lowongan'
                ],
            ],
        ];
        return view('mahasiswa/lowongan_mhs_new', $data);
    }

    public function show(int $id)
    {
        $data = [
            'title' => 'Lowongan Magang',
            'breadcrumbs' => [
                [
                    'url' => base_url('mahasiswa'), 
                    'crumb' => 'Dashboard'
                ],
                [
                    'url' => base_url('mahasiswa/lowongan'), 
                    'crumb' => 'Lowongan'
                ],
                [
                    'crumb' => 'Detail Lowongan'
                ],
            ],
        ];

        $data['lowongan'] = $this->mLowongan->detailLowongan($id);
        $data['subtitle'] = $data['lowongan']['judul'] . ' - ' . $data['lowongan']['nama_perusahaan'];

        return view('mahasiswa/lowongan_mhs_show', $data);
    }

    public function edit(int $id)
    {
        $data = [
            'title' => 'Lowongan Magang',
            'subtitle' => 'Edit Lowongan Magang',
            'breadcrumbs' => [
                [
                    'url' => base_url('mahasiswa'), 
                    'crumb' => 'Dashboard'
                ],
                [
                    'url' => base_url('mahasiswa/lowongan'), 
                    'crumb' => 'Lowongan'
                ],
                [
                    'crumb' => 'Edit Lowongan'
                ],
            ],
        ];

        $data['lowongan'] = $this->mLowongan->detailLowongan($id);

        return view('mahasiswa/lowongan_mhs_edit', $data);
    }

    public function create()
    {
        $dataIn = $this->request->getPost();

        $dataIn += ['user_id' => auth()->id()];
        
        if ($this->mLowongan->createLowongan($dataIn)) {
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
        $dataIn = $this->request->getPost();

        $dataIn += ['id' => $id];
        
        if ($this->mLowongan->save($dataIn)) {
            $response = [
                'status' => 'success',
                'message' => 'Lowongan berhasil diubah',
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Lowongan gagal diubah',
            ];
        }

        return $this->response->setJSON($response);
    }
    
    public function delete($id)
    {
        if ($this->mLowongan->deleteLowongan($id)) {
            $response = [
                'status' => 'success',
                'message' => 'Lowongan Magang berhasil dihapus',
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Lowongan Magang gagal dihapus',
            ];
        }

        return $this->response->setJSON($response);
    }

    public function lamar(int $id)
    {
        $dataIn = $this->request->getPost();
        $dataIn += [
            'user_id' => auth()->id(),
            'id_lowongan' => $id,
        ];

        $cv = $this->request->getFile('cv');
        if (isset($cv) && $cv->isValid() && !$cv->hasMoved()) {
            $cvName = $cv->getRandomName();
            if ($cv->move(SURAT_LAMARAN_UPLOAD_PATH, $cvName)) {
                $dataIn += ['cv' => $cvName];
            }
        }

        $dokPendukung = $this->request->getFile('dokumen_pendukung');
        if (isset($dokPendukung) && $dokPendukung->isValid() && !$dokPendukung->hasMoved()) {
            $dokPendukungName = $dokPendukung->getRandomName();
            if ($dokPendukung->move(SURAT_LAMARAN_UPLOAD_PATH, $dokPendukungName)) {
                $dataIn += ['dokumen_pendukung' => $dokPendukungName];
            }
        }

        if ($this->mPelamar->save($dataIn)) {
            $response = [
                'status' => 'success',
                'message' => 'Berhasil melamar',
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Gagal melamar',
            ];
        }

        return $this->response->setJSON($response);
    }
}
