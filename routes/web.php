<?php

declare(strict_types=1);

use App\Controllers\HomeController;

return [
    '/touche-pas-au-klaxon/public/' => [HomeController::class, 'index'],
    '/touche-pas-au-klaxon/public' => [HomeController::class, 'index'],
];