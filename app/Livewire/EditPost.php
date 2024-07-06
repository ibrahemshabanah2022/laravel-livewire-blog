<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class EditPost extends Component
{
    public $postId;
    public $content;
    public $isEditing = false;

    protected $rules = [
        'content' => 'required|string',
    ];

    public function mount($postId)
    {
        $post = Post::findOrFail($postId);
        $this->postId = $post->id;
        $this->content = $post->content;
    }

    public function edit()
    {
        $this->isEditing = true;
    }

    public function save()
    {
        $this->validate();

        $post = Post::findOrFail($this->postId);
        $post->content = $this->content;
        $post->save();

        $this->isEditing = false;

        session()->flash('message', 'Post updated successfully.');
    }

    public function render()
    {
        return view('livewire.edit-post');
    }
}
