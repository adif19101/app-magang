<?php

namespace App\Controllers;

use Config\Auth;

class Home extends BaseController
{
    public function index()
    {
        return view('index');
    }

    public function defaultHome()
    {
        return view('welcome_message');
    }

    public function home()
    {
        // $user = auth()->user();
        // if (! auth()->loggedIn()) {
        //     return redirect()->back()->with('error', 'You do not have permissions to access that page.');
        // }

        if (! auth()->user()->can('users.create')) {
            return redirect()->back()->with('error', 'You do not have permissions to access that page.');
        }
        return view('home');

        // echo auth()->user()->id;
    }
}
