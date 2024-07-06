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
    public $editContent;
    public $parent_id = null;
    public $editCommentId = null;
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
    public function editComment($commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $this->editCommentId = $comment->id;
        $this->editContent = $comment->content;
    }

    public function updateComment()
    {
        $this->validate([
            'editContent' => 'required|max:255',
        ]);

        $comment = Comment::findOrFail($this->editCommentId);
        $comment->content = $this->editContent;
        $comment->save();

        $this->editCommentId = null;
        $this->editContent = '';

        // Refresh the post to reflect the updated comment
        $this->post->refresh();
    }
    public function deleteComment($commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $comment->delete();


        // Refresh the Livewire component to reflect the deleted comment
        $this->post->refresh(); // Optionally refresh the post if necessary
    }


    public function render()
    {
        $comments = $this->post->comments()->whereNull('parent_id')->latest()->paginate($this->perPage);
        return view('livewire.post-comments-component', ['post' => $this->post, 'comments' => $comments]);
    }
}
