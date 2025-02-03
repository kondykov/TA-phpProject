<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

App::setLocale(env('APP_LOCALE'));

route::get('/', HomeController::class)->name('home');

route::middleware('guest')->group(function () {
    Route::get('/login', [UserController::class, 'GetLoginPage'])->name('login');
    Route::get('/register', [UserController::class, 'GetRegisterPage'])->name('register');

    Route::post('/register', [UserController::class, 'Register']);
    Route::post('/login', [UserController::class, 'Login']);
});

route::middleware('auth')->group(function () {
    route::get('/logout', [UserController::class, 'Logout'])->name('logout');
});

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
});
