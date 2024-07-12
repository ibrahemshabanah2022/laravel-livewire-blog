{{-- <div>
    <form wire:submit.prevent="search">
        <div class="form-group">
            <input type="text" id="searchTerm" class="form-control" wire:model="searchTerm">
            @error('searchTerm')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div> --}}


<form wire:submit.prevent="search">
    <div class="input-group mb-3">

        <input wire:model="searchTerm" type="text" class="form-control" placeholder="search for posts..."
            aria-label="Recipient's username" aria-describedby="basic-addon2">

        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">Button</button>
        </div>
        @error('searchTerm')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

</form>
