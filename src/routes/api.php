<?php

use App\Http\Controllers\api\ApiChatController;
use App\Http\Controllers\api\ApiIdentityController;
use App\Http\Controllers\api\ApiPostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/check', function () {
    return response()->json([
        'data' => 'true'
    ]);
});

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

    Route::prefix('/posts')->name('posts.')->group(function () {
        Route::get('/get-all', [ApiPostController::class, 'getAll'])->name('posts.all');
        Route::get('/get/{id}', [ApiPostController::class, 'getById'])->name('posts.get-by-id');
        Route::post('/create', [ApiPostController::class, 'create'])->name('posts.create');
        Route::put('/update', [ApiPostController::class, 'update'])->name('posts.update');
        Route::delete('/delete', [ApiPostController::class, 'delete'])->name('posts.delete');
    });
});
