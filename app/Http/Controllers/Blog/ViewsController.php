<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewsController extends Controller
{

    public function getBlog()
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

    public function getPanel()
    {
        $posts = Post::all();

        return view('admin.blog.panel', ['posts' => $posts]);
    }

    public function getEdit($id)
    {
        $post = Post::find($id);

        return view('admin.blog.edit', ['post' => $post]);
    }

    public function getPost($id, $link)
    {
        $post = Post::find($id);
        $author = User::find($post->author);

        $post->image = str_replace('public/', 'storage/', $post->image);
        $author->image = str_replace('public/', 'storage/', $author->image);

        return view('blog.show', ['post' => $post, 'author' => $author]);
    }

    public function getStore()
    {
        return view('admin.blog.register');
    }
}
