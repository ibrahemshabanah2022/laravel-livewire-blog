<div class="comment card" style="border: none;">
    <p>- {{ $comment->user->name }}<br><small>{{ $comment->content }} </small>
        <br>
        @auth
            <button wire:click="setParent({{ $comment->id }})" class="btn btn-link">Reply</button>

            @if (auth()->id() === $comment->user_id)
                <button wire:click="deleteComment({{ $comment->id }})" class="btn btn-link">Delete</button>
                <!-- Edit comment form -->
                <button wire:click="editComment({{ $comment->id }})" class="btn btn-link">Edit</button>


                @if ($editCommentId === $comment->id)
                    <form wire:submit.prevent="updateComment">
                        <div class="input-group mb-3">

                            <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Update</button>

                            <input wire:model="editContent" type="text" class="form-control" placeholder=""
                                aria-label="Example text with button addon" aria-describedby="button-addon1">
                        </div>


                    </form>
                @else
                    <p style="display: none;">{{ $comment->content }}</p>
                @endif
            @endif

        @endauth
    </p>
    @if ($parent_id === $comment->id)
        <form wire:submit.prevent="addComment">
            <div class="input-group mb-3">

                <input wire:model="content" type="text" class="form-control" placeholder="Add your reply..."
                    aria-label="Example text with button addon"> @error('content')
                    <span class="error">{{ $message }}</span>
                @enderror
                <button class="btn btn-outline-secondary" type="submit">Add Reply</button>
                <button class="btn btn-outline-secondary" type="button" wire:click="cancelreply">Cancel</button>
            </div>


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
