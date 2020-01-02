<?php

namespace App\Http\Controllers;

use App\Http\Requests\storePost;
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

    public function store(storePost $request)
    {

        $request->validated();

        $post = new Post;

        $post->title = $request->title;
        $post->resume = $request->resume;
        $post->text = $request->text;

        $post->save();


        return redirect()->route('painelBlog');
    }

    public function destroy($id)
    {
        Post::destroy($id);

        return redirect()->route('painelBlog');
    }

    public function getPost($id)
    {
        $post = Post::find($id);

        return view('blog.editarPost', ['post' => $post]);
    }

    public function edit(storePost $request)
    {
        $request->validated();

        $post = Post::find($request->id);

        $post->title = $request->title;
        $post->resume = $request->resume;
        $post->text = $request->text;

        $post->save();

        return redirect()->route('painelBlog');
    }
}
