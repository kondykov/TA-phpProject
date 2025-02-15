<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
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
route::get('/chat/get-users', [ChatController::class, 'getChat'])->name('chat.get-users');

route::middleware('auth')->group(function () {
    route::get('/logout', [UserController::class, 'Logout'])->name('logout');

    route::get('/chat', [ChatController::class, 'index'])->name('chat');
});


#region dashboard

route::middleware('role_or_permission:viewDashboard')->prefix('/dashboard')->group(function () {
    route::get('/', [DashboardController::class, 'GetDashboardView'])->name('dashboard');
    route::get('/users', [DashboardController::class, 'GetUsersTableView'])->name('users');

    route::get('/users/{id}', [DashboardController::class, 'GetUserView'])->name('user.profile');
    route::middleware('role_or_permission:editUser')->group(function () {
        route::get('/users/{id}/edit', [DashboardController::class, 'GetUserEditView'])->name('user.edit');
    });
    route::prefix('/security')->name('security.')->group(function () {
        route::get('/', [DashboardController::class, 'GetSecurityView'])->name('show');
        route::prefix('/roles')->name('roles.')->middleware('role_or_permission:createRolesOrPermissions')->group(function () {
            route::get('/create', [DashboardController::class, 'GetRolesCreateView'])->name('create.show');
            route::post('/create', [DashboardController::class, 'CreateRole'])->name('create.store');
            route::get('/{id}/edit', [DashboardController::class, 'GetRoleEditView'])->name('edit.show');
            route::post('/{id}/edit', [DashboardController::class, 'UpdateRole'])->name('update.store');
            route::delete('/{id}/delete', [DashboardController::class, 'DeleteRole'])->name('delete.store');
        });
    });

    route::prefix('/posts')->name('dashboard.posts.')->group(function () {
        route::get('/', [DashboardPostController::class, 'GetPostsView'])->name('show');
        route::get('/create', [DashboardPostController::class, 'GetCreatePostView'])->name('create');
        route::post('/create', [DashboardPostController::class, 'CreatePost'])->name('create.store');
        route::get('/{id}/edit', [DashboardPostController::class, 'GetEditPostView'])->name('edit.show');
        route::put('/{id}/edit', [DashboardPostController::class, 'UpdatePost'])->name('update.store');
        route::delete('/{id}/delete', [DashboardPostController::class, 'DeletePost'])->name('delete.store');

        route::prefix('/ajax')->name('ajax.')->group(function () {
            route::post('/update-thumbnail', [DashboardPostController::class, 'UpdateThumbnail'])->name('update.thumbnail');
            route::post('/remove-thumbnail', [DashboardPostController::class, 'DeleteThumbnail'])->name('remove.thumbnail');
        });
    });
});
#endregion
