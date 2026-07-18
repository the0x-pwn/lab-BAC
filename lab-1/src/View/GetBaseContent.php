<?php

namespace Src\View;

class GetBaseContent
{
    public static function baseContent(): string
    {
        ob_start();
        include view_path() . 'layout/main.php';
        return ob_get_clean();
    }
}