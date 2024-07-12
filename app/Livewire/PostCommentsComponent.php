<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Comment;

class PostCommentsComponent extends Component
{
    use WithPagination;

    public $editCommentId = null;
    public $editContent = '';
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

        $comment = Comment::create([
            'post_id' => $this->post->id,
            'user_id' => auth()->id(),
            'content' => $this->content,
            'parent_id' => $this->parent_id,
        ]);
        $this->parent_id = null;

        $this->content = '';
        $comment->save();
    }

    public function setParent($commentId)
    {
        $this->parent_id = $commentId;
    }


    public function editComment($commentId)
    {
        $this->editCommentId = $commentId;
        $comment = Comment::find($commentId);
        $this->editContent = $comment->content;
    }

    public function updateComment()
    {
        $this->validate([
            'editContent' => 'required|string|max:255',
        ]);

        $comment = Comment::find($this->editCommentId);
        $comment->content = $this->editContent;
        $comment->save();

        // Reset the form
        $this->editCommentId = null;
        $this->editContent = '';
    }

    public function deleteComment($commentId)
    {
        $comment = Comment::find($commentId);

        if ($comment) {
            $comment->delete();
            // Optionally, you can add a success message or emit an event here
        }
    }

    public function cancelreply()
    {
        $this->parent_id = null;

        $this->content = '';
    }

    public function render()
    {
        $comments = $this->post->comments()->whereNull('parent_id')->latest()->paginate($this->perPage);
        return view('livewire.post-comments-component', ['post' => $this->post, 'comments' => $comments]);
    }
}
