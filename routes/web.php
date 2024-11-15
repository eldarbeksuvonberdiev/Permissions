<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Artisan::
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/create-car', [CarController::class, 'store'])->name('car.create');

    Route::get('/read', [UserController::class, 'show'])->name('read')->middleware('can:read');
    Route::get('/update', [UserController::class, 'edit'])->name('update')->middleware('can:update');
    Route::get('/delete', [UserController::class, 'delete'])->name('delete')->middleware('can:delete');
    
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::post('/send-mail/{user}', [UserController::class, 'send'])->name('send.mail');

    Route::get('/email-verification', [UserController::class, 'verification'])->name('email.verification');
    Route::post('/email-verify', [UserController::class, 'verify'])->name('email.verify');
});

require __DIR__ . '/auth.php';
