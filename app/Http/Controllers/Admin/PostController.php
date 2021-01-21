<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditPostRequest;
use App\Http\Requests\StorePostRequest;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Jobs\CreateLog;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = new Post;

        $request->query('code') ? $posts->where('id', $request->query('code')) : '';
        $request->query('title') ? $posts->where('title', 'LIKE', '%' . $request->query('title') . '%') : '';
        $request->query('type') ? $posts->where('type', $request->query('type')) : '';
        $request->query('date_from') ? $posts->where('created_at','>=', $request->query('date_from')) : '';
        $request->query('date_to') ? $posts->where('created_at','<=', $request->query('date_to')) : '';

        $posts = $posts->orderBy('created_at', 'DESC')->paginate(10);

        return view('admin.post.index', ['posts' => $posts, 'query' => (object) $request->query()]);
    }

    public function create()
    {
        return view('admin.post.form');
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

        CreateLog::dispatch('Post', 'create', $post->id, Auth::id());

        return redirect()->route('admin.post.index')->with('success', 'Post criado com sucesso!');
    }
    
    public function edit($id)
    {
        if($post = Post::find($id)){
            return view('admin.post.form', ['post' => $post]);
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
        if ($request->has('image')) {
            Storage::disk('s3')->delete($post->image);
            $post->image = $request->image->store('img/upload', 's3');
        }

        $post->save();

        CreateLog::dispatch('Post', 'update', $post->id, Auth::id());

        return redirect()->route('admin.post.index')->with('success', 'Post editado com sucesso!');
    }

    public function destroy($id)
    {
        if ($post = Post::find($id)) {
            Storage::disk('s3')->delete($post->image);

            Post::destroy($id);
            CreateLog::dispatch('Post', 'delete', $id, Auth::id());

            return redirect()->route('admin.post.index')->with('success', 'Post deletado com sucesso!');
        } else {
            return redirect()->route('admin.post.index')->with('error', 'Post inválido.');
        }
    }
}
