<?php

declare(strict_types=1);

use App\Controllers\Auth\LoginController;
use App\Controllers\HomeController;

return [

    '/' => [HomeController::class, 'index'],

    '/login' => [LoginController::class, 'index'],

    '/logout' => [LoginController::class, 'logout'],

];