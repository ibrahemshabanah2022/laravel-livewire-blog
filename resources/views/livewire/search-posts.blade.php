<div>
    <input wire:model="searchTerm" type="text" placeholder="Search posts...">
    <button wire:click="search">Search</button>

    @if (!empty($results))
        <ul>
            @foreach ($results as $post)
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">show
                    post</button>

                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="card">
                                <div class="timeline-body">
                                    <div class="timeline-header">
                                        <span class="userimage"><img
                                                src="https://bootdey.com/img/Content/avatar/avatar3.png"
                                                alt=""></span>
                                        <span class="username">
                                            <a href="">{{ $post->user->name }}</a>
                                            <small></small>
                                        </span>
                                        Posted From <small>{{ $post->created_at->diffForHumans() }}</small>
                                        <!-- Delete Post Button (only shown to post author or admin) -->



                                        @if (auth()->id() === $post->user_id)
                                            <button class="btn btn-link" wire:click="deletePost({{ $post->id }})"
                                                onclick="confirm('Are you sure?')">Delete Post</button>
                                            <a href="{{ route('posts.edit', $post->id) }}">Edit Post</a>
                                        @endif
                                    </div>
                                    <div class="card" style="border: none;">
                                        <p>{{ \Illuminate\Support\Str::limit($post->content, 1000) }}</p>
                                    </div>
                                    <div class="timeline-likes">
                                        <div class="stats">
                                            <span class="fa-stack fa-fw stats-icon">
                                                <i class="fa fa-circle fa-stack-2x text-danger"></i>
                                                <i class="fa fa-heart fa-stack-1x fa-inverse t-plus-1"></i>
                                            </span>
                                            <span class="fa-stack fa-fw stats-icon">
                                                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                                <i class="fa fa-thumbs-up fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="input">
                                            @livewire('post-comments-component', ['post' => $post], key($post->id))
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <li>
                    <a href="{{ route('post.show', $post->id) }}">
                        {{ $post->content }}
                    </a>
                </li> --}}
            @endforeach
        </ul>
    @endif
</div>
