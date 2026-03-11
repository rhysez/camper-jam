<?php

use App\Http\Controllers\FriendshipController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::inertia('/', 'welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/feed', [UserController::class, 'index'])->name('feed');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/friends', [FriendshipController::class, 'index'])->name('friends');
});

require __DIR__.'/settings.php';
