<?php

namespace App\Controllers;

use PDO;
use Src\Authentication\Auth;

class LoginController
{
    public function index(): void
    {
        view('pages.login');
    }

    public function login(): void
    {
        $username = trim(request()->input('username'));
        $password = request()->input('password');

        if (!$username || !$password) {
            response()->jsonMessage('Username and password are required.', 400);
        }

        $checkLogin = db()->prepare('SELECT * from users WHERE username = :username');
        $checkLogin->execute([':username' => $username]);
        $user = $checkLogin->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            session()->set('login', 'true');
            session()->set('id', $user['id']);
            session()->set('username', $user['username']);
            session()->set('email', $user['email']);
            response()->redirect('/dashboard?userId=' . $user['username']);
        }

        flash()->set('error', 'Invalid credentials');
        response()->redirect('/login');
    }
}