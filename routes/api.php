<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ServiceController;

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('services', ServiceController::class);
    Route::post('/logout', [AuthController::class, 'logout']);
});
