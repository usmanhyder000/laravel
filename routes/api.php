
<?php

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::middleware('auth:sanctum')->group(function () {
    Route::get('contacts', [ContactController::class, 'index']);
    Route::get('contacts/{id}', [ContactController::class, 'show']);
    Route::post('contacts', [ContactController::class, 'store']);
    Route::put('contacts/{id}', [ContactController::class, 'update']);
    Route::delete('contacts/{id}', [ContactController::class, 'destroy']);
    Route::get('contacts/search', [ContactController::class, 'search']);
});

Route::middleware('auth:sanctum')->put('/user/profile', [UserController::class, 'update']);
