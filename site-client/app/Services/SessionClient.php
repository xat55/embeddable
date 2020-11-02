<?php

namespace App\Services;

/**
 * Устанавливает в сессию с помощью
 * глобального вспомогательного метода session()
 * значения массива $data['result']
 */
class SessionClient
{
    public function setSession(array $data)
    {
        $title = $data['result']['title'];
        $content = $data['result']['content'];
        $description = $data['result']['description'];
        
        session(['title' => $title]);
        session(['content' => $content]);
        session(['description' => $description]);
    }
}
