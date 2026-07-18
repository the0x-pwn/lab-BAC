<?php

namespace Src\Authentication;

class Auth
{
    public static function username(): string
    {
        return session()->get("username");
    }

    public static function userKey(): string
    {
        return session()->get("userKey");
    }
}