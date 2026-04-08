<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\OrgsController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\PlayersController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware(['auth'])->group(function () {
    Route::get('/', [LogController::class, 'index'])->name('logs.index');
    
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile.show');
    Route::post('/profile/updateProfile', [ProfileController::class, 'changePassword'])->name('profile.updateProfile');

    Route::get('/admins', [AdminsController::class, 'index'])->name('admins');
    Route::get('/orgs', [OrgsController::class, 'index'])->name('orgs');
    
    Route::get('/player/search', [PlayersController::class, 'searchAndShow'])->name('player.index');
    Route::get('/player/search', [PlayersController::class, 'searchAndShow'])->name('player.searchAndShow');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('users.index');
    Route::get('/admin/users/{id}/edit', [AdminUserController::class, 'edit'])->name('users.edit');
    Route::post('/admin/users/{id}', [AdminUserController::class, 'update'])->name('users.update');
});

