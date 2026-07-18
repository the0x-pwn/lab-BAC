<?php

use App\Controllers\DashboardController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use Src\Http\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [LoginController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/robots.txt', function () {
    header('Content-Type: text/plan');
    echo file_get_contents(view_path() . 'pages/robots.txt');
});

Route::post('/login', [LoginController::class, 'login']);