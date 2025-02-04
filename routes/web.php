<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Define the login route with the correct name
// Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware(\App\Http\Middleware\LoginException::class);
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

Route::middleware(\App\Http\Middleware\AuthMiddleware::class)->namespace('App\Http\Controllers')->group(function () {
    Route::get('/', 'DashboardController@index')->name('pages.dashboard');
    Route::get('/users', 'UserController@index')->name('pages.users');
    Route::post('/logout', [AuthController::class,'logout'])->name('auth.logout');

});