<?php

use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ProfileController;
use App\Http\Requests\PdfController;
use Illuminate\Support\Facades\Route;
use Nwidart\Modules\Facades\Module;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
	return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
	$modules = Module::all();
	return view('dashboard', compact('modules'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('module')->group(function () {
	Route::post('/enable', [ModuleController::class, 'enable'])->name('module.enable');
	Route::post('/disable', [ModuleController::class, 'disable'])->name('module.disable');
});

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

require __DIR__ . '/auth.php';
