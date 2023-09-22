<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Feedback\FeedbackController;
use App\Http\Controllers\Api\SupportController;
use Illuminate\Support\Facades\Route;


Route::post('/login', [AuthController::class, 'auth']);
Route::post('/user/create', [AuthController::class, 'new']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/feedback', [FeedbackController::class, 'index']);
    Route::post('/feedback/create', [FeedbackController::class, 'store']);

    Route::apiResource('/supports', SupportController::class);
});

// Route::apiResource('/users', UserController::class);

