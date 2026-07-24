<?php

use Src\Application\App;
use Src\Database\Connect;
use Src\Http\Request;
use Src\Http\Response;
use Src\Session\FlashSession;
use Src\Session\Session;
use Src\View\View;

if (!function_exists('base_path')) {
    function base_path(): string
    {
        return dirname(__DIR__) . '/../';
    }
}

if (!function_exists('view_path')) {
    function view_path(): string
    {
        return base_path() . 'Views/';
    }
}

if (!function_exists('env')) {
    function env(string $key, $default = null): mixed
    {
        return $_ENV[$key] ?? $default;
    }
}

if (!function_exists('request')) {
    function request(): Request
    {
        return new Request();
    }
}

if (!function_exists('response')) {
    function response(): Response
    {
        return new Response();
    }
}

if (!function_exists('app')) {
    function app(): App
    {
        static $instance = null;
        if (!$instance) {
            $instance = new App();
        }
        return $instance;
    }
}


if (!function_exists('view')) {
    function view(string $view, array $data = []): void
    {
        View::make($view, $data);
    }
}

if (!function_exists('session')) {
    function session(): Session
    {
        return new Session();
    }
}


if (!function_exists('flash')) {
    function flash(): FlashSession
    {
        return new FlashSession();
    }
}


if (!function_exists('db')) {
    function db(): ?PDO
    {
        $db = new Connect();
        return $db->connect();
    }
}


if (!function_exists('csrf')) {
    function csrf(): string
    {
        return bin2hex(random_bytes(60));
    }
}


if (!function_exists('code')) {
    function code(): string
    {
        return str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT);
    }
}