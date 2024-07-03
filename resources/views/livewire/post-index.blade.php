<x-layouts.app>

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    @livewire('navbar')


    <div class="container">
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
                                            <!-- begin timeline-time -->

                                            <!-- end timeline-icon -->
                                            <!-- begin timeline-body -->

                                            <div class="timeline-body">
                                                <div class="timeline-header">
                                                    <span class="userimage"><img
                                                            src="https://bootdey.com/img/Content/avatar/avatar3.png"
                                                            alt=""></span>
                                                    <span class="username"><a href="javascript:;">Sean Ngu</a>
                                                        <small></small></span>
                                                </div>

                                                <div class="timeline-content">
                                                    <p>
                                                        <td class="border px-4 py-2">
                                                            {{ \Illuminate\Support\Str::limit($post->content, 50) }}
                                                        </td>

                                                    </p>
                                                </div>
                                                <div class="timeline-likes">
                                                    <div class="stats-right">
                                                        <span class="stats-text">259 Shares</span>
                                                        <span class="stats-text">21 Comments</span>
                                                    </div>
                                                    <div class="stats">
                                                        <span class="fa-stack fa-fw stats-icon">
                                                            <i class="fa fa-circle fa-stack-2x text-danger"></i>
                                                            <i class="fa fa-heart fa-stack-1x fa-inverse t-plus-1"></i>
                                                        </span>
                                                        <span class="fa-stack fa-fw stats-icon">
                                                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                                            <i class="fa fa-thumbs-up fa-stack-1x fa-inverse"></i>
                                                        </span>
                                                        <span class="stats-total">4.3k</span>
                                                    </div>
                                                </div>
                                                <div class="timeline-footer">
                                                    <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i
                                                            class="fa fa-thumbs-up fa-fw fa-lg m-r-3"></i> Like</a>
                                                    <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i
                                                            class="fa fa-comments fa-fw fa-lg m-r-3"></i> Comment</a>
                                                    <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i
                                                            class="fa fa-share fa-fw fa-lg m-r-3"></i> Share</a>
                                                </div>
                                                <div class="timeline-comment-box">
                                                    {{-- <div class="user"><img
                                                            src="https://bootdey.com/img/Content/avatar/avatar3.png">
                                                    </div> --}}
                                                    <div class="input">
                                                        <form action="">
                                                            <div class="input-group">
                                                                <input type="text"
                                                                    class="form-control rounded-corner"
                                                                    placeholder="Write a comment...">
                                                                <span class="input-group-btn p-l-10">
                                                                    <button
                                                                        class="btn btn-primary f-s-12 rounded-corner"
                                                                        type="button">Comment</button>
                                                                </span>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end timeline-body -->
                                        </li>
                                    @endforeach


                                </ul>
                                <!-- end timeline -->
                            </div>
                            <!-- end #profile-post tab -->
                        </div>
                        <!-- end tab-content -->
                    </div>
                    <!-- end profile-content -->
                </div>
            </div>
        </div>
    </div>

</x-layouts.app>
