<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Verifikator extends BaseController
{
    public function __construct()
    {
        $this->mPlot = new \App\Models\SuratPlot();
        $this->mLowongan = new \App\Models\Lowongan();
        $this->mMahasiswa = new \App\Models\Mahasiswa();
        $this->mPerusahaan = new \App\Models\Perusahaan();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard - Verifikator',
            'subtitle' => 'Dashboard',
        ];

        $data['plot'] = [
            'counter' => $this->mPlot
                ->where('status !=', 'CANCELED')
                ->countAllResults(),
            'new' => $this->mPlot
                ->where('status', 'PENDING')
                ->countAllResults(),
            'ongoing' => $this->mPlot
                ->select('user_id')
                ->where('tanggal_mulai <=', date('Y-m-d'))
                ->where('tanggal_selesai >=', date('Y-m-d'))
                ->distinct()
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

        return view('verifikator/index', $data);
    }
}
