<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('blog.index', ['posts' => $posts]);
    }

    public function store(Request $request)
    {
        $post = new Post;

        $post->title = $request->title;
        $post->text = $request->text;

        $post->save();

        return \redirect()->route('painelBlog');
    }
}
