<?php

namespace Src\Authentication;

class Auth
{
    public static function username(): string
    {
        return session()->get("username");
    }

    public static function id(): int
    {
        return session()->get("id");
    }

    public static function logout()
    {
        if (static::isLogin()) {
            session()->destroy();
            session_destroy();
            session_unset();
            response()->redirect("/");
        }
        response()->jsonMessage('You are not logged in', 401);
    }

    public static function isLogin(): bool
    {
        if (session()->exists('login') && session()->get('login') === 'true') {
            return true;
        }
        return false;
    }
}