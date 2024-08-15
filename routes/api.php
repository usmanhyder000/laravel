<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;

// Define API routes
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::post('contacts', [ContactController::class, 'create']);
    Route::put('contacts/{id}', [ContactController::class, 'update']);
    Route::delete('contacts/{id}', [ContactController::class, 'delete']);
    Route::get('contacts/{id}', [ContactController::class, 'show']);
    Route::get('contacts', [ContactController::class, 'index']);
    Route::get('contacts/search', [ContactController::class, 'search']);
});

