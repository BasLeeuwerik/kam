<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderByDesc('created_at')->get();

        return view('post.index', [
            'posts' => $posts,
        ]);
    }

    public function show(Post $post)
    {
        return view('post.show', [
            'post' => $post,
        ]);
    }
}