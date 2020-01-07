<?php

namespace App\Http\Controllers;

use App\Http\Requests\editPost;
use App\Http\Requests\storePost;
use App\Post;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index()
    {
        $posts = DB::table('posts')->paginate(10);

        foreach ( $posts as $post){
            $post->image = str_replace('public/', 'storage/', $post->image);
        }

        return view('blog.index', ['posts'=>$posts]);
    }

    public function blogPanel()
    {
        $posts = Post::all();

        return view('blog.blogPanel', ['posts' => $posts]);
    }

    public function store(storePost $request)
    {
        $request->validated();

        $post = new Post;

        $post->title = $request->title;
        $post->resume = $request->resume;
        $post->text = $request->text;
        $post->image = $request->image->store('public/img/upload');

        $post->save();

        return redirect()->route('painelBlog');
    }

    public function destroy($id)
    {
        Post::destroy($id);

        return redirect()->route('painelBlog');
    }

    public function getEditPost($id)
    {
        $post = Post::find($id);

        return view('blog.editarPost', ['post' => $post]);
    }

    public function edit(editPost $request)
    {
        $request->validated();

        $post = Post::find($request->id);

        $post->title = $request->title;
        $post->resume = $request->resume;
        $post->text = $request->text;

        $post->save();

        return redirect()->route('painelBlog');
    }

    public function getPost($id)
    {
        $post = Post::find($id);

        $post->image = str_replace('public/', 'storage/', $post->image);

        return view('blog.showPost', ['post' => $post]);
    }
}
