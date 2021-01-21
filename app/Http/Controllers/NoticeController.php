<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Post;

class NoticeController extends Controller
{
    public function index()
    {
        $notices = Post::where('type', 'notice')->orderBy('created_at', 'DESC')->paginate(10);

        return view('post.index', ['posts' => $notices, 'title' => 'Notícias']);
    }
}
