<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegistrationController;

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.submit');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');

Route::get('register', [RegistrationController::class, 'showForm'])->name('register');
Route::post('register', [RegistrationController::class, 'register'])->name('register.submit');

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/lists', fn () => view('lists'))->name('lists');
});
