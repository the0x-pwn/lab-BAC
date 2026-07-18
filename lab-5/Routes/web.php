<?php

use App\Controllers\DashboardController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use Src\Http\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [LoginController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [DashboardController::class, 'logout']);
Route::post('/update-email', [DashboardController::class, 'UpdateEmail']);
Route::post('/update-password', [DashboardController::class, 'UpdatePassword']);
