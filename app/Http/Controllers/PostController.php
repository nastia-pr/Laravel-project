<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $postIds = [1, 2, 3, 4, 5]; 
    
        $posts = Post::whereIn('id', $postIds)->get();
    
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function apipage($page)
    {
        $perPage = 10;
        $posts = Post::orderBy('created_at', 'desc')
            ->skip(($page - 1) * $perPage)
            ->take($perPage)
            ->get(['id', 'title', 'created_at']);

        return response()->json($posts);
    }

    public function api($id)
    {
        $post = Post::findOrFail($id);

        return response()->json($post);
    }

    

}
