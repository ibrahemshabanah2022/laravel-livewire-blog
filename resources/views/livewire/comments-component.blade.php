<div>
    @foreach ($comments as $comment)
        <div class="comment">
            <p>{{ $comment->content }}</p>
            <small>By {{ $comment->user->name }} on {{ $comment->created_at }}</small>

        </div>
    @endforeach
</div>
