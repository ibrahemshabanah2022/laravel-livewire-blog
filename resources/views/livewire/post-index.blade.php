<x-layouts.app>

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    @livewire('navbar')


    <div class="container">
        @livewire('posts')

    </div>

</x-layouts.app>
