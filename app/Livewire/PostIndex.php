<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;

class PostIndex extends Component
{
    use WithPagination;

    public $perPage = 2; // You can customize the number of posts per page

    public function render()
    {


        return view('livewire.post-index');
    }
}
