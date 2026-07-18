<?php

namespace App\Controllers;

class LoginController
{
    public function index()
    {
        view('pages.login');
    }

    public function login()
    {
        flash()->set('error', 'invalid Credentials');
        response()->redirect('/login');
    }
}