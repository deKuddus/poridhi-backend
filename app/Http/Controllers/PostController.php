<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Post::get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        return Post::create($request->only('title', 'description'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return $post;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {

        $request->validate([
                    'title' => 'required',
                    'description' => 'required',
                ]);

        $post->update($request->only('title', 'description'));
        return $post;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        return $post->delete();
    }
}
