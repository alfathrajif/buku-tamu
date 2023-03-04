<?php

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TamuController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::post('/', [HomeController::class, 'store']);

Route::get('/login', [AuthenticateController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthenticateController::class, 'authentication']);
Route::get('/logout', [AuthenticateController::class, 'logout'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index']);
        Route::prefix('event')->group(function () {
            Route::get('/', [EventController::class, 'index']);
            Route::get('/create', [EventController::class, 'create']);
            Route::post('/create', [EventController::class, 'store']);
            Route::get('/{slug}', [EventController::class, 'show']);
            Route::prefix('tamu')->group(function () {
                Route::delete('/destroy/{id}', [TamuController::class, 'destroy']);
            });
            Route::delete('/destroy/{id}', [EventController::class, 'destroy']);
            Route::get('/destroy-info/{id}', [EventController::class, 'destroyInfo']);
        });
    });
});;
