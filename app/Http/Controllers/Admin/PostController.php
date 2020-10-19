<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditPostRequest;
use App\Http\Requests\StorePostRequest;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();

        return view('admin.post.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('admin.post.register');
    }

    public function store(StorePostRequest $request)
    {
        $request->validated();

        $post = new Post();

        $post->type = $request->type;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->resume = $request->resume;
        $post->text = $request->text;
        $post->image = $request->image->store('img/upload', 's3');
        $post->author_id = Auth::id();
        $post->views = 0;

        $post->save();

        return redirect()->route('admin.post.index')->with('success', 'Post criado com sucesso!');
    }
    
    public function edit($id)
    {
        if($post = Post::find($id)){
            return view('admin.post.edit', ['post' => $post]);
        }else{
            return redirect()->route('admin.post.index')->with('error', 'Post inválido.');
        }
    }
    
    public function update(EditPostRequest $request)
    {
        $request->validated();

        $post = Post::find($request->id);

        $post->type = $request->type;
        $post->title = $request->title;
        $post->resume = $request->resume;
        $post->text = $request->text;

        $post->save();

        return redirect()->route('admin.post.index')->with('success', 'Post editado com sucesso!');
    }

    public function destroy($id)
    {
        if ($post = Post::find($id)) {
            Storage::disk('s3')->delete($post->image);

            Post::destroy($id);

            return redirect()->route('admin.post.index')->with('success', 'Post deletado com sucesso!');
        } else {
            return redirect()->route('admin.post.index')->with('error', 'Post inválido.');
        }
    }
}
