<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\CreatePost;
use App\Livewire\PostIndex;

// Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');




Route::get('/postscreate', CreatePost::class)->middleware(['auth'])->name('posts.create');



Route::get('/', PostIndex::class)->name('posts.index');





require __DIR__ . '/auth.php';
