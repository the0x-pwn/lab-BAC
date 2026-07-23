<?php

namespace App\Controllers;

use Src\Authentication\Auth;

class HomeController
{
    public function dashboard()
    {
        if (!Auth::logout()) {
            response()->redirect('/login');
        }
        view('pages.dashboard');
    }

    public function logout()
    {
        Auth::logout();
    }


}