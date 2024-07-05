<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\CreatePost;
use App\Livewire\PostIndex;
// routes/web.php
use App\Livewire\UserProfile;

use Illuminate\Support\Facades\Auth;
// Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');




Route::get('/postscreate', CreatePost::class)->middleware(['auth'])->name('posts.create');



Route::get('/', PostIndex::class)->name('posts.index');



Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');



// Route::get('/users/{user}', UserProfile::class)->name('user.profile');



require __DIR__ . '/auth.php';
