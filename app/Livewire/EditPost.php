<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post;

class EditPost extends Component
{
    use WithFileUploads;

    public $postId;
    public $content;
    public $image;
    public $newImage; // To handle new image upload
    public $isEditing = true;

    protected $rules = [
        'content' => 'required|string',
        'newImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ];

    public function mount($postId)
    {
        $post = Post::findOrFail($postId);
        $this->postId = $post->id;
        $this->content = $post->content;
        $this->image = $post->image; // Add the existing image path
    }

    public function edit()
    {
        $this->isEditing = true;
    }

    public function save()
    {
        $this->validate();

        $post = Post::findOrFail($this->postId);
        $post->content = $this->content;

        if ($this->newImage) {
            // Store the image in storage/app/public/images
            $storedPath = $this->newImage->store('images', 'public');

            // Get the base name of the file
            $fileName = basename($storedPath);

            // Move the image from storage/app/public/images to public/images
            $sourcePath = storage_path('app/public/images/' . $fileName);
            $destinationPath = public_path('images/' . $fileName);

            if (!file_exists(public_path('images'))) {
                mkdir(public_path('images'), 0755, true);
            }

            if (file_exists($sourcePath)) {
                rename($sourcePath, $destinationPath);
            }

            // Update the post image path
            $post->image = 'images/' . $fileName;
        }

        $post->save();

        return redirect()->route('posts.index');
    }

    public function render()
    {
        return view('livewire.edit-post');
    }
}
