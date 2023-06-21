<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard - Admin',
            'subtitle' => 'Dashboard',
        ];

        // TODO ganti jd statistik 

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
