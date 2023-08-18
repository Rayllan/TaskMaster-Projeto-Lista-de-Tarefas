<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\TaskController;


Route::resource('store', UserController::class);

Route::get('/', [HomeController::class, 'index'])->name('site.index');

// Rotas de Login
Route::get('/login', [loginController::class, 'login'])->name('site.login');
Route::post('/auth', [loginController::class, 'auth'])->name('auth.user');
Route::get('/logout', [loginController::class, 'logout'])->name('site.logout');
Route::post('/store', [loginController::class, 'store'])->name('store.user');

Route::get('/create', [loginController::class, 'create'])->name('create.user');

// Rotas das tasks
Route::prefix('tasks')->group(function(){
    Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/{id}/edit', [TaskController::class, 'edit'])->where('id', '[0-9]+')->name('tasks.edit');
    Route::put('/{id}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');

});