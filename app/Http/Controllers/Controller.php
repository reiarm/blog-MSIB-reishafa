<?php

namespace App\Http\Controllers;

use App\Models\Post;

abstract class Controller
{
    public function index()
    {
        $posts = Post::all(); // Retrieve all posts from the database
        return view('home', ['posts' => $posts]); // Pass the posts to the view
    }
}
