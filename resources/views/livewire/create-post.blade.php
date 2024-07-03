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
                                    <li>
                                        <!-- begin timeline-time -->

                                        <!-- end timeline-icon -->
                                        <!-- begin timeline-body -->

                                        <div class="timeline-body">





                                            <div class="timeline-comment-box">

                                                <div class="input">
                                                    <form wire:submit.prevent="store">
                                                        <div class="input-group">

                                                            <textarea placeholder="Write a post..." class="form-control rounded-corner" id="content" wire:model="content"></textarea>
                                                            @error('content')
                                                                <span class="error">{{ $message }}</span>
                                                            @enderror

                                                            <button class="btn btn-primary f-s-12 rounded-corner"
                                                                type="submit">Add Post</button>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end timeline-body -->
                                    </li>


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
