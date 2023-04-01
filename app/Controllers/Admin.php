<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        echo 'admin';
    }

    public function users(int $idUser = null)
    {
        if ($idUser === null) {
            // ? return datatable list users
            return view('admin/users');
        }
    }
}
