<?php

namespace Src\Http;

class Response
{
    public function back(int $status_code = 302): void
    {
        $referrer = $_SERVER['HTTP_REFERER'] ?? '/';

        $host = parse_url($referrer, PHP_URL_HOST);

        if ($host && $host !== $_SERVER['HTTP_HOST']) {
            $referrer = '/';
        }
        header('Location: ' . $referrer, true, $status_code);
        exit;
    }

    public function redirect(string $route = '/', int $status_code = 302): void
    {
        header('Location: ' . $route, true, $status_code);
        exit;
    }

    public function jsonMessage(string $message, int $status_code): void
    {
        http_response_code($status_code);
        header('Content-Type: application/json');
        echo json_encode([
            'status' => $status_code,
            'path' => request()->path(),
            'method' => request()->method(),
            'message' => $message
        ]);
        exit;
    }
}