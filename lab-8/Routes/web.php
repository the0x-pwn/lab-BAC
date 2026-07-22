<?php

use App\Controllers\HomeController;
use App\Controllers\LoginController;
use Src\Http\Route;

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/dashboard', [HomeController::class, 'dashboard']);
Route::post('/logout', [HomeController::class, 'logout']);

Route::get('/solution', function () {
    header('Content-Type: text/plain');
    include(view_path() . 'pages/solution.php');
});