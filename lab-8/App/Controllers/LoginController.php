<?php

namespace App\Controllers;


class LoginController
{
    public function index(): void
    {
        view('pages.login');
    }

    public function login()
    {
        $username = trim(request()->input('username'));
        $password = request()->input('password');

        if ($username === 'batman' && $password === 'monkey') {
            session()->set('login', 'true');
            response()->redirect('/dashboard');
        }

        if ($username !== 'batman') {
            flash()->set('error', 'Invalid username');
            response()->redirect('/login');
        }

        if ($password !== 'monkey') {
            flash()->set('error', 'Incorrect password');
            response()->redirect('/login');
        }
    }

}

