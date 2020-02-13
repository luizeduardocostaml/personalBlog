<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ViewsController extends Controller
{

    public function getBlog()
    {
        $posts = DB::table('posts')->paginate(10);
        $ads = DB::table('advertisements')->orderBy('position')->get();

        foreach ($posts as $post) {
            $post->image = Storage::disk('s3')->url($post->image);
        }

        foreach ($ads as $ad) {
            $ad->image = Storage::disk('s3')->url($ad->image);
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
        if($post = Post::find($id)){
            return view('admin.blog.edit', ['post' => $post]);
        }else{
            return redirect()->route('post.panel')->with('error', 'Post inválido.');
        }


    }

    public function getPost($id, $link)
    {
        if($post = Post::find($id)){
            $author = User::find($post->author);

            $post->image = Storage::disk('s3')->url($post->image);
            $author->image = Storage::disk('s3')->url($author->image);

            return view('blog.show', ['post' => $post, 'author' => $author]);
        }else{
            return redirect()->route('forbiddenRoute');
        }

    }

    public function getStore()
    {
        return view('admin.blog.register');
    }
}
