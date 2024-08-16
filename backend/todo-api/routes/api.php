<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Routes for Authentication
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('auth.logout');

// Route to get the authenticated user
Route::get('/user', [UserController::class, 'show'])->middleware('auth:sanctum')->name('auth.user');

// Routes for Todo management
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('todos', TodoController::class)->names([
        'index' => 'todos.index',
        'store' => 'todos.store',
        'show' => 'todos.show',
        'update' => 'todos.update',
        'destroy' => 'todos.destroy',
    ]);
});


