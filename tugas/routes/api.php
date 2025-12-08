<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\AuthController;

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
    Route::post('me', 'me');
});

// Public Routes (Get All & Get Detail)
Route::get('treatments', [TreatmentController::class, 'index']);
Route::get('treatments/{treatment}', [TreatmentController::class, 'show']);

// Protected Routes (Create, Update, Delete)
Route::middleware('auth:api')->group(function () {
    Route::post('treatments', [TreatmentController::class, 'store']);
    Route::put('treatments/{treatment}', [TreatmentController::class, 'update']);
    Route::delete('treatments/{treatment}', [TreatmentController::class, 'destroy']);
});
