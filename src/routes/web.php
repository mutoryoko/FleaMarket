<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/', [ItemController::class, 'index'])->name('index');
Route::get('/item/{item_id}', [ItemController::class, 'detail'])->name('detail');
// Route::post('/detail/{item_id}/like', [LikeController::class, 'store'])->name('like');
// Route::delete('/detail/{item_id}/like', [LikeController::class, 'destroy'])->name('unlike');

Route::get('/register', [UserController::class, 'registerForm'])->name('registerForm');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/login', [UserController::class, 'loginForm'])->name('loginForm');
Route::post('/login', [UserController::class, 'login'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/mypage', [MypageController::class, 'index'])->name('profile');
    Route::get('/mypage/profile', [MypageController::class, 'edit'])->name('profile.edit');
    Route::put('/mypage/profile', [MypageController::class, 'update'])->name('profile.update');

    Route::get('/sell', [ItemController::class, 'sellForm'])->name('sellForm');
    Route::post('/sell', [ItemController::class, 'store'])->name('sell');

    Route::get('/purchase/{item_id}', [PurchaseController::class, 'index'])->name('purchase');
    Route::post('/purchase/{item_id}', [PurchaseController::class, 'buyItem'])->name('buyItem');
    Route::get('/purchase/address/{item_id}', [PurchaseController::class, 'edit'])->name('address.edit');
    Route::put('/purchase/address/{item_id}', [PurchaseController::class, 'update'])->name('address.update');

    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});