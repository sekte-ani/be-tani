<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
    
    Route::get('/chat', [ChatController::class, 'index']);
    Route::post('/chat', [ChatController::class, 'store']);

    Route::get('/modul', [ModulController::class, 'index']);
    Route::get('/modul/{id}', [ModulController::class, 'show']);

    Route::get('/profile/{id}', [ProfileController::class, 'show']);
    Route::patch('/profile/{id}', [ProfileController::class, 'update']);
});

Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/register', [AuthController::class, 'registration'])->middleware('guest');
