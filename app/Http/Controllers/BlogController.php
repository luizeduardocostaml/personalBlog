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
        $ads = DB::table('advertisements')->orderBy('position')->get();

        foreach ( $posts as $post){
            $post->image = str_replace('public/', 'storage/', $post->image);
        }

        foreach ( $ads as $ad){
            $ad->image = str_replace('public/', 'storage/', $ad->image);
        }

        return view('blog.index', ['posts' => $posts, 'ads' => $ads]);
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

        $link = str_replace(' ', '-', $post->title);
        $link = strtolower($link);

        $post->link = $link;

        $post->save();

        return redirect()->route('post.panel')->with('success', 'Post criado com sucesso!');
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        Storage::delete($post->image);

        Post::destroy($id);

        return redirect()->route('post.panel')->with('success', 'Post deletado com sucesso!');
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

        $link = str_replace(' ', '-', $post->title);
        $link = strtolower($link);

        $post->link = $link;

        $post->save();

        return redirect()->route('post.panel')->with('success', 'Post editado com sucesso!');
    }

    public function getPost($id, $link)
    {
        $post = Post::find($id);

        $post->image = str_replace('public/', 'storage/', $post->image);

        return view('blog.show', ['post' => $post]);
    }
}
