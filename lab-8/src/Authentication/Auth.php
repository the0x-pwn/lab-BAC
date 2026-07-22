<?php

namespace Src\Authentication;

class Auth
{
    public static function logout()
    {
        session_regenerate_id(true);
        session()->destroy();
        session_destroy();
        session_unset();
        response()->redirect('/login');
    }

}