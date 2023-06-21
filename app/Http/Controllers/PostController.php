<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function create(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'min:3'],
            'body' => ['required', 'min:3'],
        ]);

        $data['title'] = strip_tags($data['title']);
        $data['body'] = strip_tags($data['body']);
        $data['user_id'] = auth()->id();
        Post::create($data);
        return redirect()->route('home');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => ['required', 'min:3'],
            'body' => ['required', 'min:3'],
        ]);
        $product = Post::findOrFail($id);
        $product->update($data);
        return redirect()->route('home');
    }

    public function delete($id)
    {
        $post = Post::find($id);

        if (!$post) {
            // Handle the case where the post doesn't exist
            // You can redirect or return an error response
            return redirect()->route('home');
        }

        // Check if the authenticated user is the owner of the post
        if ($post->user_id !== auth()->id()) {
            // Handle the case where the authenticated user is not authorized to delete the post
            // You can redirect or return an error response
            return redirect()->route('home');
        }

        $post->delete();

        return redirect()->route('home');
    }

    public function edit($id)
    {
        $post = Post::find($id);

        if (!$post) {
            // Handle the case where the post doesn't exist
            // You can redirect or return an error response
            return redirect()->route('home');
        }

        // Check if the authenticated user is the owner of the post
        if ($post->user_id !== auth()->id()) {
            // Handle the case where the authenticated user is not authorized to edit the post
            // You can redirect or return an error response
            return redirect()->route('home');
        }

        return view('post.edit', compact('post'));
    }
}
