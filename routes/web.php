<?php

use App\Livewire\Pages\FollowerList;
use App\Livewire\Pages\Home;
use App\Livewire\Pages\Notifications;
use App\Livewire\Pages\Profile;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Number;

Route::get('/', Home::class)->name('home');
Route::get('/profile/{user:username}', Profile::class)->name('profile.show');

Route::middleware('auth')->group(function () {
    Route::get('/notifications', Notifications::class)->name('notifications');
    Route::get('/follower/list', FollowerList::class)->name('follower.list');
});
