<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Post;

class ViewsController extends Controller
{

    public function getBlog()
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(10);

        return view('blog.index', ['posts' => $posts]);
    }

    public function getPanel()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();

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
            $post->views += 1;
            $post->save();

            return view('blog.show', ['post' => $post]);
        }else{
            return redirect()->route('forbiddenRoute');
        }

    }

    public function getStore()
    {
        return view('admin.blog.register');
    }
}
