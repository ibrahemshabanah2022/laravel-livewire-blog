<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Str;

class CreatePost extends Component
{

    public $content;

    protected $rules = [

        'content' => 'required|string',
    ];

    public function store()
    {
        $this->validate();

        Post::create([
            'user_id' => auth()->id(),
            'content' => $this->content,


        ]);

        session()->flash('message', 'Post successfully created.');
        return redirect()->route('posts.index');

        // Reset form fields
        $this->reset(['content']);
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
