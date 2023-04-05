<?php

namespace App\Controllers;

use Config\Auth;

class Home extends BaseController
{
    public function index()
    {
        // session()->setFlashdata(
        //     'actionMsg',
        //     [
        //         'icon' => 'success',
        //         'message' => 'Welcome to CodeIgniter 4!'
        //     ]
        // );
        return view('index');
    }

    public function defaultHome()
    {
        return view('welcome_message');
    }

    public function home()
    {
        if (!auth()->user()->can('home.access')) {
            toastNotif('error', 'You do not have permissions to access that page.');
            return redirect()->back();
        }

        return view('home');
    }

    public function superadmin()
    {
        $user = auth()->user();
        $user->syncGroups('superadmin');

        echo $user->getGroups();
    }
}
