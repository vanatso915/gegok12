<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode as Middleware;

class CheckForMaintenanceMode extends Middleware
{
    /**
     * The URIs that should be reachable while maintenance mode is enabled.
     * 💡 【終極強效特權名單】：將首頁和登入頁面加入排除，徹底粉碎維護阻擋！
     *
     * @var array
     */
    protected $except = [
        '/',
        '/login',
        'login',
        'installer*',
        '/installer*'
    ];
}
