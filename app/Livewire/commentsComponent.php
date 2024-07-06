<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;

class commentsComponent extends Component
{
    public $post;


    public function render()
    {
        $comments = Comment::where('post_id', $this->post->id)->get();
        return view('livewire.comments-component', ['comments' => $comments]);
    }
}
