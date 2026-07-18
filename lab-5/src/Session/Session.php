<?php

namespace Src\Session;

class Session
{
    protected static string $prefix = "info";

    public function set(string $key, string|array $value): void
    {
        $_SESSION[static::$prefix][$key] = $value;
    }

    public function exists(string $key): bool
    {
        return isset($_SESSION[static::$prefix][$key]);
    }

    public function get(string $key): mixed
    {
        return $this->exists($key) ? $_SESSION[static::$prefix][$key] : null;
    }

    public function remove(string $key): void
    {
        if ($this->exists($key)) {
            unset($_SESSION[static::$prefix][$key]);
        }
    }

    public function destroy(): void
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            $_SESSION = [];
            session_destroy();
            session_unset();
        }
    }
}