<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        {{-- <a class="navbar-brand" href="#">Your Logo</a> --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('posts.index') }}">Posts</a>
                </li>
                <li class="nav-item">

                    <a class="nav-link" href="{{ route('posts.create') }}">Add Post</a>
                </li>
                <a href="{{ route('profile') }}">
                    {{ __('Profile') }}
                </a>

                <!-- Authentication -->
                <button wire:click="logout" class="w-full text-start">
                    <a>
                        {{ __('Log Out') }}
                    </a>
                    <!-- Add more menu items as needed -->
            </ul>
        </div>
    </div>
</nav>
