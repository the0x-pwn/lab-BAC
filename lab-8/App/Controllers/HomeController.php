<?php

namespace App\Controllers;

use Src\Authentication\Auth;

class HomeController
{
    public function dashboard()
    {
        view('pages.dashboard');
    }

    public function logout()
    {
        Auth::logout();
    }


}