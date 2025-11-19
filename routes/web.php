<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuilderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public homepage
Route::get('/', function () {
    return view('auth.login');
});

// Dashboard → ALWAYS redirect to templates page
Route::get('/dashboard', function () {
    return redirect()->route('templates');
})->middleware(['auth'])->name('dashboard');

// Auth-protected routes
Route::middleware('auth')->group(function () {

    // Your template gallery page
    Route::get('/templates', function () {
        return view('templates');
    })->name('templates');

    // Profile routes (optional)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Breeze authentication routes (login, register, logout, etc.)
require __DIR__.'/auth.php';




// ...

Route::middleware('auth')->group(function () {
    Route::get('/templates', function () {
        return view('templates');
    })->name('templates');

    Route::get('/builder', [BuilderController::class, 'show'])->name('builder');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
