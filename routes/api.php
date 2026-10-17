
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShoeController;

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    Route::get('/shoes', [ShoeController::class, 'index']);
    Route::post('/shoes', [ShoeController::class, 'store']);
    Route::get('/shoes/{shoe}', [ShoeController::class, 'show']);
    Route::put('/shoes/{shoe}', [ShoeController::class, 'update']);
    Route::delete('/shoes/{shoe}', [ShoeController::class, 'destroy']);
});
