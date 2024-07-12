<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class SearchResults extends Component
{
    public $searchTerm;
    public $results = [];

    public function mount($searchTerm)
    {
        $this->searchTerm = $searchTerm;
        $this->search();
    }

    public function search()
    {
        $this->results = Post::where('content', 'like', '%' . $this->searchTerm . '%')
            ->orderBy('created_at', 'desc')
            ->get();
    }
    public function deletePost($postId)
    {
        $post = Post::findOrFail($postId);
        $post->delete();

        session()->flash('message', 'Post deleted successfully.');

        // Refresh the Livewire component to reflect the updated list
        return redirect()->route('posts.index');
    }
    public function render()
    {
        return view('livewire.search-results', ['results' => $this->results]);
    }
}
