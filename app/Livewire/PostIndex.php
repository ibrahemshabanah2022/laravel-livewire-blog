<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;

class PostIndex extends Component
{
    use WithPagination;

    public $perPage = 5; // You can customize the number of posts per page

    public function render()
    {
        $posts = Post::with('user', 'comments')
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.post-index', ['posts' => $posts]);
    }

    public function deletePost($postId)
    {
        $post = Post::findOrFail($postId);
        $post->delete();

        session()->flash('message', 'Post deleted successfully.');

        // Refresh the Livewire component to reflect the updated list
        return redirect()->route('posts.index');
    }
}
