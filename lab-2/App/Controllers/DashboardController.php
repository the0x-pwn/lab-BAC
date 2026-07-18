<?php

namespace App\Controllers;

use Src\Authentication\Auth;

class DashboardController
{
    public function index()
    {
        if (!session()->exists('login') && session()->get('login') !== 'true') {
            response()->redirect('/');
        }
        view('pages.dashboard', compact('flag'));
    }

    public function UpdateEmail()
    {
        if (!Auth::isLogin()) {
            response()->jsonMessage('You must be logged in to update your email', 401);
        }

        $email = trim(request()->input('email'));

        if (!$email) {
            flash()->set('error', 'Email is required');
            response()->redirect('/dashboard');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            flash()->set('error', 'Invalid email address');
            response()->redirect('/dashboard');
        }

        $update_email = db()->prepare('UPDATE users SET email = :email WHERE id = :id');
        $update_email->execute([':email' => $email, ':id' => Auth::id()]);

        if ($update_email) {
            session()->set('email', $email);
            flash()->set('success', 'Your email has been updated successfully');
            response()->redirect('/dashboard');
        }

        flash()->set('error', 'An unexpected error occurred');
        response()->redirect('/dashboard');
    }

    public function logout(): void
    {
        Auth::logout();
    }
}