<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditPostRequest;
use App\Http\Requests\StorePostRequest;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::where('type', 'blog')->orderBy('created_at', 'DESC')->paginate(10);

        return view('post.index', ['posts' => $posts]);
    }

    public function show($id, $link)
    {
        if ($post = Post::find($id)) {
            $post->views += 1;
            $post->save();

            return view('post.show', ['post' => $post]);
        } else {
            return redirect()->route('forbiddenRoute');
        }
    }
}
