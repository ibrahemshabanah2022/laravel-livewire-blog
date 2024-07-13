<div>

    @if ($comments->isEmpty())
        <p>No comments</p>
    @else
        <div style="height:350px;line-height:3em;overflow:scroll;padding:5px;">

            @foreach ($comments as $comment)
                @include('livewire.comment', ['comment' => $comment, 'post' => $post])
            @endforeach
            <div x-intersect="$wire.loadMore()"></div>

            {{-- @if ($comments->hasMorePages())
                <div class="text-center">
                    <button wire:click="loadMore" class="btn btn-primary">Load More comments</button>
                </div>
            @endif --}}
        </div>




    @endif



    @auth
        <form wire:submit.prevent="addComment">
            <textarea class="form-control" wire:model="content"></textarea>
            @error('content')
                <span class="error">{{ $message }}</span>
            @enderror
            <button class="btn btn-primary" type="submit">Add Comment</button>
        </form>
    @else
        <a href="{{ route('login') }}" class="nav-link">
            Login to add comment
    </a> @endauth

</div>
