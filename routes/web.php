<?php

declare(strict_types=1);

use App\Controllers\Auth\LoginController;
use App\Controllers\HomeController;
use App\Controllers\TripController;
use App\Controllers\UserController;
use App\Controllers\AgencyController;

return [

    '/' => [HomeController::class, 'index'],

    '/login' => [LoginController::class, 'index'],
    '/logout' => [LoginController::class, 'logout'],

    // Trajets
    '/trips' => [TripController::class, 'index'],
    '/trips/create' => [TripController::class, 'create'],
    '/trips/store' => [TripController::class, 'store'],
    '/trips/edit' => [TripController::class, 'edit'],
    '/trips/update' => [TripController::class, 'update'],
    '/trips/delete' => [TripController::class, 'delete'],

    // Utilisateurs
    '/users' => [UserController::class, 'index'],
    '/users/create' => [UserController::class, 'create'],
    '/users/store' => [UserController::class, 'store'],
    '/users/edit' => [UserController::class, 'edit'],
    '/users/update' => [UserController::class, 'update'],
    '/users/delete' => [UserController::class, 'delete'],

    // Agences
    '/agencies' => [AgencyController::class, 'index'],
    '/agencies/create' => [AgencyController::class, 'create'],
    '/agencies/store' => [AgencyController::class, 'store'],
    '/agencies/edit' => [AgencyController::class, 'edit'],
    '/agencies/update' => [AgencyController::class, 'update'],
    '/agencies/delete' => [AgencyController::class, 'delete'],

];