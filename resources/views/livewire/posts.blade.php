{{-- <link href="{{ asset('css/styles.css') }}" rel="stylesheet"> --}}

<div class="row">
    <div class="col-md-12">
        <div id="content" class="content content-full-width">
            <!-- begin profile -->

            <!-- end profile -->
            <!-- begin profile-content -->
            <div class="profile-content">
                <!-- begin tab-content -->
                <div class="tab-content p-0">
                    <!-- begin #profile-post tab -->
                    <div class="tab-pane fade active show" id="profile-post">
                        <!-- begin timeline -->
                        <ul class="timeline">
                            @foreach ($posts as $post)
                                <li>
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
                                                <button class="btn btn-link"
                                                    wire:click="deletePost({{ $post->id }})"
                                                    onclick="confirm('Are you sure?')">Delete Post</button>
                                                <a href="{{ route('posts.edit', $post->id) }}">Edit Post</a>
                                            @endif
                                        </div>
                                        <div class="card" style="border: none;">
                                            @if ($post->image)
                                                <img src="{{ asset($post->image) }}" class="card-img-top"
                                                    alt="Post Image" style="width: 50%; height: 50%;">
                                            @endif
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
                                        <div class="timeline-comment-box">
                                            <div class="input">
                                                Comments
                                                @livewire('post-comments-component', ['post' => $post], key($post->id))
                                            </div>
                                        </div>

                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div x-intersect="$wire.loadMore()"></div>


                    </div>
                    <!-- end #profile-post tab -->
                </div>
                <!-- end tab-content -->
            </div>
            <!-- end profile-content -->
        </div>
    </div>
</div>
