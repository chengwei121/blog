<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Image;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Create a new post
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        // Check if the request contains images and process them
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $path = $file->store('images', 'public');  // Store the file in the 'public/images' directory
                Image::create([
                    'path' => $path,
                    'post_id' => $post->id,
                ]);
            }
        }

        return redirect()->route('posts.index');
    }
}

?>