<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\CreatePost;
use App\Livewire\PostIndex;
// routes/web.php
use App\Livewire\UserProfile;
use App\Livewire\UserPosts;
use App\Livewire\EditPost;
use App\Livewire\SearchPosts;
use App\Livewire\SearchResults;

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


// Route::get('/posts/search', SearchPosts::class)->name('posts.search');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('post.show');

Route::post('/posts', [CreatePost::class, 'store'])->name('posts.store');





Route::get('/search', SearchPosts::class)->name('search');
Route::get('/search/results/{searchTerm}', SearchResults::class)->name('search.results');





require __DIR__ . '/auth.php';
