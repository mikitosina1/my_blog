<?php

use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\ProfileController;
use App\Http\Requests\PdfController;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider, and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
	return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
	return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/about', function () {
	return view('about');
})->name('about');

Route::get('/lang/{locale}', [LocalizationController::class, 'switch'])->name('lang.switch');

Route::middleware('auth')->group(function () {
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('pdf')->group(function () {
	Route::post('/', [PdfController::class, 'generatePdf'])->name('pdf.generatePdf');
});

Broadcast::channel('chat.{roomId}', function ($user, $roomId) {
	return true;
});

// Email Verification Routes
Route::get('/email/verify', function () {
	return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', VerifyEmailController::class)
	->middleware(['auth', 'signed'])
	->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
	->middleware(['auth', 'throttle:6,1'])
	->name('verification.send');


require __DIR__ . '/auth.php';
