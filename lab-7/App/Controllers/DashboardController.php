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

        $users = db()->prepare('SELECT * FROM users WHERE username != "administrator" ORDER BY username ASC');
        $users->execute();
        $users = $users->fetchAll(PDO::FETCH_ASSOC);

        view('pages.dashboard', compact('users'));
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


    public function UpdateRole()
    {
        if (!Auth::isLogin()) {
            response()->jsonMessage('You must be logged in to update your email', 401);
        }


        if (!Auth::isAdmin()) {
            flash()->set('error', 'access denied');
            response()->redirect('/dashboard?userId=' . session()->get('username'));
        }

        $name = trim(request()->input('role'));

        if (!$name) {
            flash()->set('error', 'Role is required');
            response()->redirect('/dashboard?userId=' . session()->get('username'));
        }

        $checkUser = db()->prepare('SELECT 1 FROM users WHERE username = :username LIMIT 1');
        $checkUser->execute([':username' => $name]);

        if (!$checkUser->fetchColumn()) {
            flash()->set('error', 'User Not Found');
            response()->redirect('/dashboard?userId=' . session()->get('username'));
        }

        $update_role = db()->prepare('UPDATE users SET roleid = 2 WHERE username = :username');
        $update_role->execute([':username' => $name]);

        if ($update_role->rowCount() > 0) {
            flash()->set(
                'success',
                'Permissions for <span style="color:red;">' . htmlspecialchars($name) . '</span> have been updated successfully.'
            );
            session_regenerate_id(true);
            response()->redirect('/dashboard?userId=' . session()->get('username'));
        }
    }

    public function getRequestUpdateRole()
    {
        if (!Auth::isLogin()) {
            response()->jsonMessage('You must be logged in to update your email', 401);
        }

        $name = trim(request()->input('role'));

        if (!$name) {
            flash()->set('error', 'Role is required');
            response()->redirect('/dashboard?userId=' . session()->get('username'));
        }

        if ($name !== session()->get('username')) {
            flash()->set('error', 'access denied');
            response()->redirect('/dashboard?userId=' . session()->get('username'));
        }

        $checkUser = db()->prepare('SELECT 1 FROM users WHERE username = :username LIMIT 1');
        $checkUser->execute([':username' => session()->get('username')]);

        if (!$checkUser->fetchColumn()) {
            flash()->set('error', 'User Not Found');
            response()->redirect('/dashboard?userId=' . session()->get('username'));
        }

        $update_role = db()->prepare('UPDATE users SET roleid = 2 WHERE username = :username');
        $update_role->execute([':username' => session()->get('username')]);

        if ($update_role->rowCount() > 0) {
            session()->set('roleid', 2);
            flash()->set(
                'success',
                'Permissions for <span style="color:red;">' . htmlspecialchars($name) . '</span> have been updated successfully.'
            );
            response()->redirect('/dashboard?userId=' . session()->get('username'));
        }
    }

    public function logout(): void
    {
        Auth::logout();
    }
}