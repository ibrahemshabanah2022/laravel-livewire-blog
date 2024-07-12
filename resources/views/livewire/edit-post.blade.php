<div>
    @if ($isEditing)
        <form wire:submit.prevent="save">
            <div class="form-group">
                <label for="content">Content</label>
                <textarea id="content" class="form-control" wire:model="content"></textarea>
                @error('content')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Current Image</label>
                @if ($image)
                    <div>
                        <img src="{{ asset($image) }}" alt="Post Image" style="width: 100px; height: 100px;">
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="newImage">Upload New Image</label>
                <input type="file" id="newImage" wire:model="newImage">
                @error('newImage')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    @endif
</div>
