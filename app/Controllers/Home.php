<?php

namespace App\Controllers;

use Config\Auth;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Magang Informatika Unsika',
        ];

        return view('homepage', $data);
    }

    public function offline()
    {
        $data = [
            'title' => 'Magang Informatika Unsika',
        ];

        return view('offline', $data);
    }
}
