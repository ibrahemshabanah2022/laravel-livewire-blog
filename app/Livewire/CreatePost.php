<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;

    public $content;
    public $image; // Add property for image upload

    protected $rules = [
        'content' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ];

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            // Get the uploaded file
            $file = $request->file('image');

            // Define the path to store the image in the public directory
            $destinationPath = public_path('images');

            // Ensure the destination path exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Generate a unique file name
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Move the file to the destination path
            $file->move($destinationPath, $fileName);

            // Store the relative path
            $imagePath = 'images/' . $fileName;
        }

        Post::create([
            'user_id' => auth()->id(),
            'content' => $request->input('content'),
            'image' => $imagePath,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
