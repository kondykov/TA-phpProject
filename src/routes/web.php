<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

route::get('/', HomeController::class)->name('home');

route::middleware('guest')->group(function () {
    Route::get('/login', [UserController::class, 'GetLoginPage'])->name('login');
    Route::get('/register', [UserController::class, 'GetRegisterPage'])->name('register');

    Route::post('/register', [UserController::class, 'Register']);
    Route::post('/login', [UserController::class, 'Login']);
});

route::middleware('auth')->group(function () {
    route::get('/logout', 'App\Http\Controllers\UserController@Logout')->name('logout');
});
