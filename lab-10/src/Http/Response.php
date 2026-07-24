<?php

namespace Src\Http;

class Response
{
    public function back(int $status_code = 302): void
    {
        $referrer = $_SERVER['HTTP_REFERER'] ?? '/';

        $refHost = parse_url($referrer, PHP_URL_HOST);
        $refPort = parse_url($referrer, PHP_URL_PORT);

        // استخرج الدومين والبورت الحاليين من HTTP_HOST بدل استخدام SERVER_PORT مباشرة
        $currentHostFull = $_SERVER['HTTP_HOST'] ?? '';
        $currentHostParts = explode(':', $currentHostFull);
        $currentHost = $currentHostParts[0];
        $currentPort = $currentHostParts[1] ?? null;

        $isSameHost = $refHost === $currentHost
            && (string) ($refPort ?? '') === (string) ($currentPort ?? '');

        if (!$refHost || !$isSameHost) {
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