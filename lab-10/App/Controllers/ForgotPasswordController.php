<?php

namespace App\Controllers;

use Src\Authentication\Auth;

class ForgotPasswordController
{
    public function index()
    {
        if (!Auth::isLogin()) {
            response()->redirect('/login');
        }
        view('pages.forgot_password');
    }

    public function forgot_password()
    {
        if (!Auth::isLogin()) {
            response()->redirect('/login');
        }

        $username = request()->input('username');

        if (!$username) {
            response()->jsonMessage('username or email is required.', 422);
        }

        if (!Auth::isValidUsername($username)) {
            flash()->set('error', 'This username "' . $username . '" does not exist.');
            response()->redirect('/forgot-password');
        }



        if ($username !== session()->get('username')) {
            flash()->set('error', 'Username does not match your session.');
            response()->redirect('/forgot-password');
        }
        $token = csrf();
        session()->set('URLToken', $token);
        session()->set('code', strtolower(explode('/', $_SERVER['SERVER_PROTOCOL'])[0]) . '://' . $_SERVER['HTTP_HOST'] . '/rest-password/' . $token);
        flash()->set('success', 'A password reset link has been sent to your email.');
        response()->redirect('/forgot-password');
    }

}