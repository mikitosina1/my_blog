<?php

use App\Http\Controllers\Pdf\GeneratePdfController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web'])
    ->prefix('pdf')
    ->name('pdf.')
    ->group(function () {
        Route::post('/', GeneratePdfController::class)->name('generate');
    });
