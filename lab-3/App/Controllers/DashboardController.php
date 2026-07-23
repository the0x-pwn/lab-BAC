<?php

namespace App\Controllers;

use Src\Authentication\Auth;

class DashboardController
{
    public function index()
    {
        if (!Auth::logout()) {
            response()->redirect('/login');
        }
        view('pages.dashboard');
    }

    public function UpdateEmail()
    {
        if (!Auth::isLogin()) {
            response()->jsonMessage('You must be logged in to update your email', 401);
        }

        $email = trim(request()->input('email'));
        $roleid = request()->exists('roleid') ? (int) request()->input('roleid') : Auth::id();

        if (!$email) {
            flash()->set('error', 'Email is required');
            response()->redirect('/dashboard');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            flash()->set('error', 'Invalid email address');
            response()->redirect('/dashboard');
        }

        $update_email = db()->prepare('UPDATE users SET email = :email, roleid = :roleid WHERE id = :id');
        $result = $update_email->execute([
            ':email' => $email,
            ':roleid' => $roleid,
            ':id' => Auth::id(),
        ]);

        if ($result) {
            flash()->set('success', 'Your email has been updated successfully');
            session()->set('email', $email);
            session()->set('roleid', $roleid);
            echo json_encode([
                'id' => Auth::id(),
                'email' => $email,
                'roleid' => $roleid,
            ]);
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