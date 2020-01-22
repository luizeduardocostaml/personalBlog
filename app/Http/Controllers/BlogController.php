<?php

namespace App\Http\Controllers;

use App\Http\Requests\editPost;
use App\Http\Requests\storePost;
use App\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

        return view('blog.panel', ['posts' => $posts]);
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

        return redirect()->route('blogPanel')->with('success', 'Post criado com sucesso!');
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        Storage::delete($post->image);

        Post::destroy($id);

        return redirect()->route('blogPanel')->with('success', 'Post deletado com sucesso!');
    }

    public function getEditPost($id)
    {
        $post = Post::find($id);

        return view('blog.edit', ['post' => $post]);
    }

    public function edit(editPost $request)
    {
        $request->validated();

        $post = Post::find($request->id);

        $post->title = $request->title;
        $post->resume = $request->resume;
        $post->text = $request->text;

        $post->save();

        return redirect()->route('blogPanel')->with('success', 'Post editado com sucesso!');
    }

    public function getPost($id)
    {
        $post = Post::find($id);

        $post->image = str_replace('public/', 'storage/', $post->image);

        return view('blog.show', ['post' => $post]);
    }
}
