<?php

namespace Src\View;

class View
{
    public static function make(string $view, array $data = [])
    {
        $getBaseContent = GetBaseContent::baseContent();
        $getViewContent = GetViewContent::getViewContent($view, data: $data);
        echo str_replace("{{content}}", $getViewContent, $getBaseContent);
    }
}