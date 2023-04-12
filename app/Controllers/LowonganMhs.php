<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class LowonganMhs extends BaseController
{
    public function index()
    {
        return view('mahasiswa/lowongan_mhs');
    }

    public function new()
    {
        return view('mahasiswa/lowongan_mhs_new');
    }

    public function show(int $id)
    {
        
    }

    public function edit(int $id)
    {
        
    }

    public function create()
    {
        
    }

    public function update(int $id)
    {
        
    }
    
    public function delete(int $id)
    {
        
    }
}
