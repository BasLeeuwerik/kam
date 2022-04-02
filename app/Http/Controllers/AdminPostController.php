<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Http\Requests\UpdatePostRequest;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderByDesc('created_at')->paginate(20);

        return view('admin.posts.index', [
            'posts' => $posts,
        ]);
    }

    public function show(Post $post)
    {
        return view('admin.posts.show', [
            'post' => $post,
        ]);
    }

    public function create()
    {
        $categories = Category::orderBy('title')->get();

        return view('admin.posts.create', [
            'categories' => $categories,
        ]);
    }

    public function store(StorePostRequest $request)
    {
        Auth::id();

        $validated = (object)$request->validated();

        $post = new Post();
        $post->title = $validated->title;
        $post->body = $validated->body;
        $post->user_id = "1";
        $post->category_id = $validated->category_id;
        $post->save();

        return redirect()->route('admin.posts.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::orderBy('title')->get();

        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $validated = (object)$request->validated();
        
        $post->title = $validated->title;
        $post->body = $validated->body;
        $post->category_id = $validated->category_id;
        $post->save();

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect(route('admin.posts.index'))->with('notification', '"' . $post->title .  '" deleted!');
    }
}