<?php

namespace App\Controllers;

use Src\Authentication\Auth;

class DashboardController
{
    public function index(): void
    {
        if (!Auth::isLogin()) {
            response()->redirect('/');
        }

        view('pages.dashboard');
    }

    public function UpdateEmail(): void
    {
        if (!Auth::isLogin()) {
            response()->jsonMessage('You must be logged in to update your email', 401);
        }

        $email = (string) trim(request()->input('email'));

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


    public function rest_password(string $token): void
    {
        if (!Auth::isLogin()) {
            response()->redirect('/login');
        }

        if (!session()->exists('URLToken') || !session()->exists('code') || !$token || !hash_equals(session()->get('URLToken'), $token)) {
            flash()->set('error', 'This password reset link is invalid or has expired.');
            response()->redirect('/dashboard');
        }

        view('pages.rest_password');
    }

    public function updatePassword(): void
    {
        if (!Auth::isLogin()) {
            response()->redirect('/login');
        }

        $username = (string) trim(request()->input('username'));
        $password = (string) request()->input('password');
        $confirm_password = (string) request()->input('confirm-password');

        if (!$password || !$confirm_password) {
            response()->jsonMessage('Both fields are required.', 422);
        }

        if (strlen($password) <= 3) {
            response()->jsonMessage('Password must be longer than 3 characters.', 422);
        }

        if ($password !== $confirm_password) {
            response()->jsonMessage('Passwords do not match.', 422);
        }

        $stmt = db()->prepare('UPDATE users SET password = :password, password_text = :passwordText WHERE username = :username');
        $resultUpdatePassword = $stmt->execute([
            ':password' => password_hash($password, PASSWORD_DEFAULT),
            'passwordText' => $password,
            ':username' => $username
        ]);

        if ($resultUpdatePassword) {
            flash()->set('success', 'Your password has been updated successfully.');
            session()->remove('URLToken');
            session()->remove('code');
            response()->redirect('/dashboard');
        }

        response()->jsonMessage('Something went wrong. Please try again.', 500);
    }


    public function logout(): void
    {
        Auth::logout();
    }
}