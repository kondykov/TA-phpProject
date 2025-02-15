<?php

use App\Http\Controllers\api\ApiChatController;
use App\Http\Controllers\api\ApiIdentityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('/identity')->name('identity.')->group(function () {
    Route::post('/auth', [ApiIdentityController::class, 'authenticate'])->name('auth');
    Route::get('/get-user-by-token', [ApiIdentityController::class, 'verify'])->name('get-user');
});


Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [ApiIdentityController::class, 'logout'])->name('logout');
    Route::prefix('/chat')->name('chat.')->group(function () {
        Route::get('/get-all', [ApiChatController::class, 'getAll'])->name('chat.all');
        Route::get('/create', [ApiChatController::class, 'create'])->name('chat.create');
        Route::post('/receive', [ApiChatController::class, 'receive'])->name('chat.receive');
        Route::get('/get-all-messages', [ApiChatController::class, 'getAllMessages'])->name('chat.messages');
    });
});
