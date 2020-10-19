<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::where('type', 'blog')->orderBy('created_at', 'DESC')->paginate(10);

        return view('post.index', ['posts' => $posts, 'title' => 'Blog']);
    }

    public function show($slug)
    {
        if ($post = Post::where('slug', $slug)->first()) {
            $post->views += 1;
            $post->save();

            return view('post.show', ['post' => $post]);
        } else {
            return redirect()->route('forbiddenRoute');
        }
    }
}
