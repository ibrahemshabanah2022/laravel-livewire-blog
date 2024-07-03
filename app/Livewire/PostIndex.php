<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;

class PostIndex extends Component
{
    use WithPagination;

    public function render()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.post-index', ['posts' => $posts]);
    }
}
