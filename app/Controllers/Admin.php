<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->mSurat = new \App\Models\Surat();
        $this->mPlot = new \App\Models\SuratPlot();
        $this->mLowongan = new \App\Models\Lowongan();
        $this->mMahasiswa = new \App\Models\Mahasiswa();
        $this->mPerusahaan = new \App\Models\Perusahaan();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard - Admin',
            'subtitle' => 'Dashboard',
        ];

        $data['surat'] = [
            'counter' => $this->mSurat
                ->where('status !=', 'CANCELED')
                ->countAllResults(),
            'new' => $this->mSurat
                ->where('status', 'PENDING')
                ->countAllResults(),
        ];

        $data['plot'] = [
            'counter' => $this->mPlot
                ->where('status !=', 'CANCELED')
                ->countAllResults(),
            'new' => $this->mPlot
                ->where('status', 'APPROVED')
                ->countAllResults(),
        ];

        $data['lowongan'] = $this->mLowongan
            ->where('deadline_daftar >', date('Y-m-d'))
            ->orWhere('deadline_daftar', null)
            ->countAllResults();

        $data['mahasiswa'] = $this->mMahasiswa
            ->countAll();

        $data['perusahaan'] = $this->mPerusahaan
            ->countAll();

        return view('admin/index', $data);
    }

    public function users(int $idUser = null)
    {
        if ($idUser === null) {
            // ? return datatable list users
            return view('admin/users');
        }
    }
}
