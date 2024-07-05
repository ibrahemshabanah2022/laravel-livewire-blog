<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Comment;

class PostCommentsComponent extends Component
{
    use WithPagination;

    public $post;
    public $content;
    public $parent_id = null;
    public $perPage = 5;

    public function mount($post)
    {
        $this->post = $post;
    }

    public function loadMore()
    {
        $this->perPage += 5;
    }

    public function addComment()
    {
        $this->validate([
            'content' => 'required|max:255',
        ]);

        Comment::create([
            'post_id' => $this->post->id,
            'user_id' => auth()->id(),
            'content' => $this->content,
            'parent_id' => $this->parent_id,
        ]);

        $this->content = '';
        $this->parent_id = null;

        // Refresh the post to include the new comment
        $this->post->refresh();
    }

    public function setParent($commentId)
    {
        $this->parent_id = $commentId;
    }

    public function render()
    {
        $comments = $this->post->comments()->whereNull('parent_id')->latest()->paginate($this->perPage);
        return view('livewire.post-comments-component', ['post' => $this->post, 'comments' => $comments]);
    }
}
