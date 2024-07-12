<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if ($isEditing)
        <form wire:submit.prevent="save">
            <div class="form-group m-5">
                <label for="content">Post Content</label>
                <textarea id="content" class="form-control" wire:model="content" rows="8"></textarea>
                @error('content')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    @else
        <div class="card m-5">
            <p>{{ $content }}</p>
            <button wire:click="edit" class="btn btn-secondary">Edit</button>
        </div>
    @endif
</div>
