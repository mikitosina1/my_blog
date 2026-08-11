<?php

use App\Http\Controllers\Api\V1\AppBootstrapController;
use App\Http\Controllers\Api\V1\Auth\CurrentUserController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')
    ->name('api.v1.')
    ->group(function () {
        Route::middleware('auth:sanctum')->group(function () {
            Route::get('/me', CurrentUserController::class)->name('me');
        });
        Route::get('/app/bootstrap', AppBootstrapController::class)
            ->middleware('web')
            ->name('api.app.bootstrap');
    });
