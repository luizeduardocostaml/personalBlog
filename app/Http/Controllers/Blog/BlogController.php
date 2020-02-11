<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditPostRequest;
use App\Http\Requests\StorePostRequest;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{

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
        if($post = Post::find($id)){
            Storage::delete($post->image);

            Post::destroy($id);

            return redirect()->route('post.panel')->with('success', 'Post deletado com sucesso!');
        }else{
            return redirect()->route('post.panel')->with('error', 'Post inválido.');
        }


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

}
