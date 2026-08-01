<?php

declare(strict_types=1);

use App\Controllers\Auth\LoginController;
use App\Controllers\HomeController;
use App\Controllers\TripController;

return [

    '/' => [HomeController::class, 'index'],
    '/login' => [LoginController::class, 'index'],
    '/logout' => [LoginController::class, 'logout'],
    '/trips' => [TripController::class, 'index'],
    '/trips' => [TripController::class, 'index'],
    '/trips/create' => [TripController::class, 'create'],
    '/trips/store' => [TripController::class, 'store'],
    '/trips/edit' => [TripController::class, 'edit'],
    '/trips/update' => [TripController::class, 'update'],
    '/trips/delete' => [TripController::class, 'delete'],

];