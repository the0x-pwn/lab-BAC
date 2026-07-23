<?php

use App\Controllers\DashboardController;
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




Route::get('/email-verification', function () {

    if (!Auth::isLogin()) {
        response()->redirect('/');
    }
    if (session()->get('isValid2FA') !== 'true') {
        response()->redirect('/dashboard?userId=' . session()->get('username'));
    }

    view('pages.email_verify');
});



Route::post('/email-verification', function () {

    if (!Auth::isLogin()) {
        response()->redirect('/');
    }

    if (session()->get('isValid2FA') !== 'true') {
        response()->redirect('/dashboard?userId=' . session()->get('username'));
    }

    $code = request()->input('code');

    if ($code === session()->get('code')) {
        response()->redirect('/dashboard?userId=' . session()->get('username'));
    }

    flash()->set('error', 'Invalid verification code. Please try again.');
    response()->redirect('/email-verification');
});



Route::get('/email-clint', function () {

    if (!Auth::isLogin()) {
        response()->redirect('/');
    }

    if (session()->get('isValid2FA') !== 'true') {
        response()->redirect('/dashboard?userId=' . session()->get('username'));
    }

    view('pages.email_clint');
});
