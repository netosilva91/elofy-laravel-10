<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SupportController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;


// Route::post('/login', [AuthController::class, 'auth']);

Route::apiResource('/users', UserController::class);

Route::apiResource('/supports', SupportController::class);
