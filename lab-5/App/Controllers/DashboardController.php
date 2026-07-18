<?php

namespace App\Controllers;

use PDO;
use Src\Authentication\Auth;

class DashboardController
{
    public function index()
    {
        if (!session()->exists('login') && session()->get('login') !== 'true') {
            response()->redirect('/');
        }

        $userId = $_GET['userId'] ?? null;

        if ($userId) {
            $user = db()->prepare("SELECT * FROM users WHERE username = :username");
            $user->execute([':username' => $userId]);
            $userLogin = $user->fetch(PDO::FETCH_ASSOC);
        }

        if (!$userLogin) {
            response()->jsonMessage('Not Found', '404');
        }


        view('pages.dashboard', compact('flag', 'userLogin'));
    }

    public function UpdateEmail()
    {
        if (!Auth::isLogin()) {
            response()->jsonMessage('You must be logged in to update your email', 401);
        }

        $email = trim(request()->input('email'));

        if (!$email) {
            flash()->set('error', 'Email is required');
            response()->redirect('/dashboard?userId=' . session()->get('username'));
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            flash()->set('error', 'Invalid email address');
            response()->redirect('/dashboard?userId=' . session()->get('username'));
        }

        $update_email = db()->prepare('UPDATE users SET email = :email WHERE id = :id');
        $update_email->execute([':email' => $email, ':id' => Auth::id()]);

        if ($update_email) {
            session()->set('email', $email);
            flash()->set('success', 'Your email has been updated successfully');
            response()->redirect('/dashboard?userId=' . session()->get('username'));
        }

        flash()->set('error', 'An unexpected error occurred');
        response()->redirect('/dashboard?userId=' . session()->get('username'));
    }



    public function UpdatePassword()
    {
        if (!Auth::isLogin()) {
            response()->jsonMessage('You must be logged in to update your email', 401);
        }

        $password = trim(request()->input('password'));

        if (!$password) {
            flash()->set('error', 'Password is required');
            response()->redirect('/dashboard?userId=' . session()->get('username'));
        }

        if (strlen($password) < 4) {
            flash()->set('error', 'Password must be at least 4 characters long');
            response()->redirect('/dashboard?userId=' . session()->get('username'));
        }

        if ($password == session()->get('passText')) {
            flash()->set('error', 'New password must be different from the current password');
            response()->redirect('/dashboard?userId=' . session()->get('username'));
        }

        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $update_password = db()->prepare('UPDATE users SET password = :password ,password_text = :passText WHERE id = :id');
        $update_password->execute([':password' => $password_hash, 'passText' => $password, ':id' => Auth::id()]);

        if ($update_password) {
            flash()->set('success', 'Your password has been updated successfully');
            session()->set('passText', $password);
            response()->redirect('/dashboard?userId=' . session()->get('username'));
        }

        flash()->set('error', 'An unexpected error occurred');
        response()->redirect('/dashboard?userId=' . session()->get('username'));
    }

    public function logout(): void
    {
        Auth::logout();
    }
}