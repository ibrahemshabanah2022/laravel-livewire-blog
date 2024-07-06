<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if ($isEditing)
        <form wire:submit.prevent="save">
            <div class="form-group">
                <label for="content">Content</label>
                <textarea id="content" class="form-control" wire:model="content"></textarea>
                @error('content')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    @else
        <div>
            <p>{{ $content }}</p>
            <button wire:click="edit" class="btn btn-secondary">Edit</button>
        </div>
    @endif
</div>
