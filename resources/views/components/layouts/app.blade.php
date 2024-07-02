<!DOCTYPE html>
<html>

<head>
    <title>Laravel Livewire</title>
    @livewireStyles
</head>

<body>
    <div class="container">
        {{ $slot }}
    </div>
    @livewireScripts
</body>

</html>
