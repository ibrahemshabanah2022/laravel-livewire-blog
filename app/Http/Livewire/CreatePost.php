<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Str;

class CreatePost extends Component
{
    public $title;
    public $slug;
    public $content;
    public $status = 'draft';

    protected $rules = [
        'title' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:posts,slug',
        'content' => 'required|string',
        'status' => 'required|in:draft,published',
    ];

    public function store()
    {
        $this->validate();

        Post::create([
            'user_id' => auth()->id(),
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'content' => $this->content,
            'status' => $this->status,
        ]);

        session()->flash('message', 'Post successfully created.');

        // Reset form fields
        $this->reset(['title', 'slug', 'content', 'status']);
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
