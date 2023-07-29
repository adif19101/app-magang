<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Perusahaan extends BaseController
{
    public function __construct()
    {
        $this->mLowongan = new \App\Models\Lowongan();
        $this->mPelamar = new \App\Models\Pelamar();
        $this->db = \Config\Database::connect();
    }
    
    public function index()
    {
        $data = [
            'title' => 'Dashboard - Perusahaan',
            'subtitle' => 'Dashboard',
        ];

        $data['lowongan'] = [
            'all' => $this->mLowongan
                ->where('user_id', auth()->user()->id)
                ->countAllResults(),
            'active' => $this->mLowongan
                ->where('user_id', auth()->user()->id)
                ->where('deadline_daftar >', date('Y-m-d'))
                ->orWhere('deadline_daftar', null)
                ->countAllResults(),
        ];

        $listLowongan = $this->db->table('lowongan')
            ->select('lowongan.id', false)
            ->where('user_id', auth()->user()->id);
        $data['pelamar'] = $this->mPelamar
            ->whereIn('id_lowongan', $listLowongan)
            ->countAllResults();
            
        return view('perusahaan/index', $data);
    }
}
