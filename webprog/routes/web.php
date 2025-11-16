<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Authentication routes
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Main CRUD page
Route::get('/main', [ItemController::class, 'index'])->name('main');
Route::post('/items', [ItemController::class, 'store'])->name('items.store');
Route::post('/items/{id}/update', [ItemController::class, 'update'])->name('items.update');
Route::post('/items/{id}/delete', [ItemController::class, 'destroy'])->name('items.destroy');
