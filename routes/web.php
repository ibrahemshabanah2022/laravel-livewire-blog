<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\CreatePost;
use App\Livewire\PostIndex;
// routes/web.php
use App\Livewire\UserProfile;
use App\Livewire\UserPosts;
use App\Livewire\EditPost;

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


Route::get('/user/posts', UserPosts::class)->name('user.posts')->middleware('auth');


Route::get('/posts/{postId}/edit', EditPost::class)->name('posts.edit');

// Route::get('/users/{user}', UserProfile::class)->name('user.profile');



require __DIR__ . '/auth.php';
