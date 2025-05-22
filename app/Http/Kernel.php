<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // Стандартні middleware Laravel
    ];

    protected $middlewareGroups = [
        'web' => [
            // Стандартні middleware для web-групи
        ],
        'api' => [
            // Стандартні middleware для api-групи
        ],
    ];

    protected $middlewareAliases = [
        'admin' => \App\Http\Middleware\IsAdmin::class, // Додано ваш middleware
        // Інші aliases...
    ];
}