<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;

/* AUTH */
Route::get('/', [AuthController::class, 'loginForm']);
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::get('/register', [AuthController::class, 'registerForm']);

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

/* DASHBOARD (COM SESSION) */
Route::get('/dashboard', [TaskController::class, 'dashboard'])->middleware('auth');

/* LOGOUT */
Route::get('/logout', [AuthController::class, 'logout']);

/* TASKS */
Route::post('/tasks', [TaskController::class, 'store']);
Route::get('/tasks/{id}', [TaskController::class, 'update']);
Route::get('/delete/{id}', [TaskController::class, 'destroy']);