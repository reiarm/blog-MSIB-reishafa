<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'content'       => 'required|string',
            'image'         => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'is_published'  => 'nullable|boolean',
            'category_id'   => 'required|exists:categories,id',
        ]);

        try {
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('asset-images', 'public');
            }

            Post::create([
                'title'         => $request->title,
                'content'       => $request->content,
                'image'         => $imagePath,
                'is_published'  => $request->boolean('is_published'), // Correct handling of boolean
                'category_id'   => $request->category_id
            ]);

            return redirect()->route('posts.index')->with('success', 'Post created successfully');
        } catch (\Exception $err) {
            return redirect()->route('posts.index')->with('error', $err->getMessage());
        }
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'content'       => 'required|string',
            'image'         => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'is_published'  => 'nullable|boolean',
            'category_id'   => 'required|exists:categories,id',
        ]);

        try {
            $data = $request->only(['title', 'content', 'category_id']);
            $data['is_published'] = $request->boolean('is_published'); // Handle checkbox properly

            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('asset-images', 'public');
            }

            $post->update($data);

            return redirect()->route('posts.index')->with('success', 'Post updated successfully');
        } catch (\Exception $err) {
            return redirect()->route('posts.index')->with('error', $err->getMessage());
        }
    }

    public function destroy(Post $post)
    {
        try {
            $post->delete();
            return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
        } catch (\Exception $err) {
            return redirect()->route('posts.index')->with('error', $err->getMessage());
        }
    }
}
