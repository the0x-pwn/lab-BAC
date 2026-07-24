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
            response()->redirect("/login");
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

    public static function isAdmin(): bool
    {
        if (!session()->exists('roleid') || session()->get('roleid') != 2) {
            return false;
        }
        return true;
    }

    public static function isValidUsername(string $username): bool
    {
        $stmt = db()->prepare('SELECT 1 FROM users WHERE username = :username LIMIT 1');
        $stmt->execute([':username' => $username]);
        return $stmt->rowCount() > 0;
    }

}