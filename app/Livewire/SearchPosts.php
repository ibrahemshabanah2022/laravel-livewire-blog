<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class SearchPosts extends Component
{
    public $searchTerm;
    public $results;

    public function mount()
    {
        $this->initialize();
    }

    public function initialize()
    {
        $this->searchTerm = '';
        $this->results = [];
    }

    public function search()
    {
        $this->validate([
            'searchTerm' => 'required|min:3',
        ]);

        $this->results = Post::where('content', 'like', '%' . $this->searchTerm . '%')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function render()
    {
        return view('livewire.search-posts');
    }
}
