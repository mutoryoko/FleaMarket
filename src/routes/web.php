<?php

use App\Http\Controllers\StripeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\RecommendMylistTabs;
use App\Http\Livewire\TransactionTabs;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



Route::get('/', [ItemController::class, 'index'])->name('index');
Route::get('/?tab=mylist', RecommendMylistTabs::class)->name('myList');
Route::get('/item/{item_id}', [ItemController::class, 'detail'])->name('detail');

Route::get('/register', [UserController::class, 'registerForm'])->name('registerForm');
Route::post('/register', [UserController::class, 'register'])->name('register');

// メール認証画面
Route::get('/email/verify', [MailController::class, 'notice'])->name('verification.notice');

// メール認証リンクのクリック処理（認証完了アクション）
Route::get('/email/verify/{id}/{hash}', [MailController::class, 'verify'
])->middleware(['signed'])->name('verification.verify');

// 認証メール再送信
Route::post('/email/verification-notification-guest',[MailController::class, 'sendForGuest'
])->middleware(['throttle:6,1'])->name('verification.send.guest');
Route::post('/email/verification-notification',[MailController::class, 'send'
])->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/login', [UserController::class, 'loginForm'])->name('loginForm');
Route::post('/login', [UserController::class, 'login'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::post('/item/{item_id}/like', [LikeController::class, 'store'])->name('like');
    Route::delete('/item/{item_id}/unlike', [LikeController::class, 'destroy'])->name('unlike');

    Route::post('/item/{item_id}/comment', [CommentController::class, 'store'])->name('comment');

    Route::get('/mypage', [MypageController::class, 'index'])->name('profile');
    Route::get('/mypage/profile', [MypageController::class, 'edit'])->name('profile.edit');
    Route::put('/mypage/profile', [MypageController::class, 'update'])->name('profile.update');
    Route::get('/mypage?page=sell', TransactionTabs::class)->name('mypage.sell');
    Route::get('/mypage?page=buy', TransactionTabs::class)->name('mypage.buy');

    Route::get('/sell', [ItemController::class, 'sellForm'])->name('sellForm');
    Route::post('/sell', [ItemController::class, 'store'])->name('sell');

    Route::get('/purchase/{item_id}', [PurchaseController::class, 'index'])->name('purchase');
    // Route::post('/purchase/{item_id}', [PurchaseController::class, 'buyItem'])->name('buyItem');　//stripe利用のため削除予定
    Route::get('/purchase/address/{item_id}', [PurchaseController::class, 'edit'])->name('address.edit');
    Route::put('/purchase/address/{item_id}', [PurchaseController::class, 'update'])->name('address.update');

    // 応用:stripe決済
    Route::post('/checkout', [StripeController::class, 'checkout'])->name('checkout');
    Route::get('/checkout/success', [StripeController::class, 'success'])->name('checkout.success');
    Route::get('/checkout/cancel', [StripeController::class, 'cancel'])->name('checkout.cancel');

    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});