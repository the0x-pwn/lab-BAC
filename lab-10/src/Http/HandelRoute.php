<?php

namespace Src\Http;

class HandelRoute
{
    public static function HandelRouteString(string $action, array $params = [])
    {
        if (is_string($action) && str_contains($action, "@")) {
            [$controller, $method] = explode("@", $action);
            $controller = "App\\Controllers\\" . $controller;

            if (!class_exists($controller)) {
                response()->jsonMessage("Not Found Controller $controller", 404);
            }

            if (!method_exists($controller, $method)) {
                response()->jsonMessage("Not Found Method $controller:$method", 404);
            }

            call_user_func_array([new $controller, $method], $params);
        }
    }

    public static function HandelRouteArray(array $action, array $params = []): void
    {
        if (is_array($action)) {
            [$controller, $method] = $action;

            if (!class_exists($controller)) {
                response()->jsonMessage("Not Found Controller $controller", 404);
            }

            if (!method_exists($controller, $method)) {
                response()->jsonMessage("Not Found Method $controller:$method", 404);
            }

            call_user_func_array([new $controller, $method], $params);
        }
    }

    public static function HandelRouteCallable(callable $action, array $params = [])
    {
        if (is_callable($action)) {
            call_user_func_array($action, $params);
        }
    }
}