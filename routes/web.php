<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\CreatePost;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');




Route::get('/posts/create', CreatePost::class)->name('posts.create');







require __DIR__ . '/auth.php';
