<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/', [ItemController::class, 'index'])->name('index');
Route::get('/item/{item_id}', [ItemController::class, 'detail'])->name('detail');

Route::get('/register', [UserController::class, 'registerForm'])->name('registerForm');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/login', [UserController::class, 'loginForm'])->name('loginForm');
Route::post('/login', [UserController::class, 'login'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/mypage', [MypageController::class, 'index'])->name('profile');
    Route::get('/mypage/profile', [MypageController::class, 'edit'])->name('edit');
    Route::post('/mypage/profile', [MypageController::class, 'update'])->name('update');

    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});

