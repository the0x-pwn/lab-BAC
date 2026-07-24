<?php

namespace App\Controllers;

class DashboardController
{
    public function index()
    {
        $flag = '0328e051467a5a5f6531322feaa117c9b941d3ae5211b609cbccb00b776e';
        view('pages.dashboard', compact('flag'));
    }
}