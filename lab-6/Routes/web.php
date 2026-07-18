<?php

use App\Controllers\DashboardController;
use App\Controllers\HomeController;
use Src\Http\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index']);
