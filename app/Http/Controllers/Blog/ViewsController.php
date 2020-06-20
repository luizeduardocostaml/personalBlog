<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ViewsController extends Controller
{

    public function getBlog()
    {
        $posts = DB::table('posts')->orderBy('created_at', 'DESC')->paginate(10);

        foreach ($posts as $post) {
            $post->image = Storage::disk('s3')->url($post->image);
        }

        return view('blog.index', ['posts' => $posts]);
    }

    public function getPanel()
    {
        $posts = DB::table('posts')->orderBy('created_at', 'DESC')->get();

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

            $post->views += 1;
            $post->save();

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
