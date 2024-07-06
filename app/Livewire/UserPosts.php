<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Ensure correct import for User model
use App\Models\Post; // Ensure correct import for Post model
use Livewire\WithPagination;

class UserPosts extends Component
{
    use WithPagination;

    public function render()
    {
        $user = Auth::user(); // Fetch authenticated user
        $posts = $user->posts; // Ensure correct method call

        return view('livewire.user-posts', [
            'posts' => $posts
        ]);
    }
}
