<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditPostRequest;
use App\Http\Requests\StorePostRequest;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $posts = DB::table('posts')->paginate(10);
        $ads = DB::table('advertisements')->orderBy('position')->get();

        foreach ($posts as $post) {
            $post->image = str_replace('public/', 'storage/', $post->image);
        }

        foreach ($ads as $ad) {
            $ad->image = str_replace('public/', 'storage/', $ad->image);
        }

        return view('blog.index', ['posts' => $posts, 'ads' => $ads]);
    }

    public function blogPanel()
    {
        $posts = Post::all();

        return view('blog.panel', ['posts' => $posts]);
    }

    public function store(StorePostRequest $request)
    {
        $request->validated();

        $post = new Post;

        $post->title = $request->title;
        $post->resume = $request->resume;
        $post->text = $request->text;
        $post->link = Str::slug($post->title, '-');
        $post->image = $request->image->store('public/img/upload');
        $post->author = Auth::id();

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

    public function edit(EditPostRequest $request)
    {
        $request->validated();

        $post = Post::find($request->id);

        $post->title = $request->title;
        $post->resume = $request->resume;
        $post->text = $request->text;
        $post->link = Str::slug($post->title, '-');

        $post->save();

        return redirect()->route('post.panel')->with('success', 'Post editado com sucesso!');
    }

    public function getPost($id, $link)
    {
        $post = Post::find($id);
        $author = User::find($post->author);

        $post->image = str_replace('public/', 'storage/', $post->image);
        $author->image = str_replace('public/', 'storage/', $author->image);

        return view('blog.show', ['post' => $post, 'author' => $author]);
    }
}
