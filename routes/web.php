<?php

use App\Http\Controllers\Web\AboutController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\LocalizationController;
use App\Http\Controllers\Web\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/about', AboutController::class)->name('about');

Route::get('/lang/{locale}', [LocalizationController::class, 'switch'])
    ->whereIn('locale', ['en', 'ru', 'de'])
    ->name('lang.switch');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::prefix('profile')
        ->name('profile.')
        ->controller(ProfileController::class)
        ->group(function () {
            Route::get('/', 'edit')->name('edit');
            Route::patch('/', 'update')->name('update');
            Route::delete('/', 'destroy')->name('destroy');
        });
});
Route::view('/react', 'react');

require __DIR__.'/auth.php';
require __DIR__.'/pdf.php';

if (app()->environment('local')) {
    require __DIR__.'/websockets.php';
}
