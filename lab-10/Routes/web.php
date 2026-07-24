<?php

use App\Controllers\DashboardController;
use App\Controllers\ForgotPasswordController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use Src\Authentication\Auth;
use Src\Http\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [LoginController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [DashboardController::class, 'logout']);
Route::post('/update-email', [DashboardController::class, 'UpdateEmail']);
Route::get('/forgot-password', [ForgotPasswordController::class, 'index']);
Route::post('/forgot-password', [ForgotPasswordController::class, 'forgot_password']);
Route::get('/email-clint', function () {

    if (!Auth::isLogin()) {
        response()->redirect('/login');
    }

    if (session()->exists('code')) {
        view('pages.email_clint');
    }

    response()->back();
});

Route::get('/rest-password/{token}', [DashboardController::class, 'rest_password']);
Route::post('/update-password', [DashboardController::class, 'updatePassword']);