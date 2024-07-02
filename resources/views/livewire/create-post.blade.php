<x-layouts.app>
    <div>
        <form wire:submit.prevent="store">
            <div>
                <label for="title">Title:</label>
                <input type="text" id="title" wire:model="title">
                @error('title')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="slug">Slug:</label>
                <input type="text" id="slug" wire:model="slug">
                @error('slug')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="content">Content:</label>
                <textarea id="content" wire:model="content"></textarea>
                @error('content')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="status">Status:</label>
                <select id="status" wire:model="status">
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                </select>
                @error('status')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit">Add Post</button>
        </form>
    </div>
</x-layouts.app>
