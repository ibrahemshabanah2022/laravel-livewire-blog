<div class="comment card" style="border: none;">
    <p>- {{ $comment->user->name }}<br><small>{{ $comment->content }} </small>
        <br>
        @auth
            <button wire:click="setParent({{ $comment->id }})" class="btn btn-link">Reply</button>

            @if (auth()->id() === $comment->user_id)
                <button wire:click="deleteComment({{ $comment->id }})" onclick="confirm('Are you sure?')"
                    class="btn btn-link">Delete</button>
                <!-- Edit comment form -->
                @if ($editCommentId === $comment->id)
                    <form wire:submit.prevent="updateComment">
                        <textarea wire:model="editContent"></textarea>
                        @error('editContent')
                            <span>{{ $message }}</span>
                        @enderror
                        <button type="submit" class="btn btn-link">Update</button>
                        <button wire:click="editComment(null)" class="btn btn-link">Cancel</button>
                    </form>
                @else
                    <!-- Edit button -->
                    <button wire:click="editComment({{ $comment->id }})" class="btn btn-link">Edit</button>
                @endif
            @endif

        @endauth
    </p>
    @if ($parent_id === $comment->id)
        <form wire:submit.prevent="addComment">
            <textarea wire:model="content"></textarea>
            @error('content')
                <span class="error">{{ $message }}</span>
            @enderror
            <button type="submit">Add Reply</button>
        </form>
    @endif

    @if ($comment->replies)
        @foreach ($comment->replies as $reply)
            @include('livewire.comment', ['comment' => $reply, 'post' => $post])
        @endforeach
    @endif
</div>

<style>
    .comment {
        position: relative;
        padding-left: 20px;
        margin-bottom: 15px;
    }

    .comment:before {
        content: "";
        position: absolute;
        top: 0;
        bottom: 0;
        left: 10px;
        width: 1px;
        background: #ccc;
    }

    .comment .comment {
        padding-left: 40px;
    }

    .comment .comment:before {
        left: 30px;
    }
</style>