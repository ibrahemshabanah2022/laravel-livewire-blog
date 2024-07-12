<?php

namespace App\Livewire;

use Livewire\Component;

class SearchPosts extends Component
{
    public $searchTerm;

    public function mount()
    {
        $this->initialize();
    }

    public function initialize()
    {
        $this->searchTerm = '';
    }

    public function search()
    {
        $this->validate([
            'searchTerm' => 'required|min:1',
        ]);

        // Redirect to the results page with the search term
        return redirect()->route('search.results', ['searchTerm' => $this->searchTerm]);
    }



    public function render()
    {
        return view('livewire.search-posts');
    }
}
