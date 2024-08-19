<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Todo\IndexController;
use App\Http\Controllers\Todo\StoreController;
use App\Http\Controllers\Todo\ShowController;
use App\Http\Controllers\Todo\UpdateController;
use App\Http\Controllers\Todo\DestroyController;
use Illuminate\Support\Facades\Route;

// Routes for Authentication
Route::post('/register', RegisterController::class)->name('auth.register');
Route::post('/login', LoginController::class)->name('auth.login');
Route::post('/logout', LogoutController::class)->middleware('auth:sanctum')->name('auth.logout');

// Route to get the authenticated user
Route::get('/user', UserController::class)->middleware('auth:sanctum')->name('auth.user');

// Routes for Todo management
Route::get('/todos', IndexController::class)->name('todos.index');
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/todos', StoreController::class)->name('todos.store');
    Route::get('/todos/{todo}', ShowController::class)->name('todos.show');
    Route::put('/todos/{todo}', UpdateController::class)->name('todos.update');
    Route::delete('/todos/{todo}', DestroyController::class)->name('todos.destroy');
});
