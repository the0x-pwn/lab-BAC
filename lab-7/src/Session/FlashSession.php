<?php

namespace Src\Session;

class FlashSession
{
    protected static $prefix = "message";
    public function set(string $type, string $message)
    {
        $_SESSION[static::$prefix] = [
            "type" => $type,
            "message" => $message
        ];
    }

    public function ExistsType(string $type): bool
    {
        return isset($_SESSION[static::$prefix]['type'])
            && $_SESSION[static::$prefix]['type'] === $type;
    }

    public function get(string $type): mixed
    {
        if ($this->ExistsType($type)) {
            $value = $_SESSION[static::$prefix]['message'];
            unset($_SESSION[static::$prefix]);
            return $value;
        }
        return null;
    }
}