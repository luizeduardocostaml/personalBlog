<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Notice;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ViewsController extends Controller
{
    public function getNews()
    {
        $notices = DB::table('notices')->orderBy('created_at', 'DESC')->paginate(10);

        foreach ($notices as $notice) {
            $notice->image = Storage::disk('s3')->url($notice->image);
        }

        return view('news.index', ['notices' => $notices]);
    }

    public function getPanel()
    {
        $notices = DB::table('notices')->orderBy('created_at', 'DESC')->get();

        return view('admin.news.panel', ['notices' => $notices]);
    }

    public function getEdit($id)
    {
        if($notice = Notice::find($id)){
            return view('admin.news.edit', ['notice' => $notice]);
        }else{
            return redirect()->route('news.panel')->with('error', 'Post inválido.');
        }
    }

    public function getNotice($id, $link)
    {
        if($notice = Notice::find($id)){
            $author = User::find($notice->author);

            $notice->views += 1;
            $notice->save();

            $notice->image = Storage::disk('s3')->url($notice->image);
            $author->image = Storage::disk('s3')->url($author->image);

            return view('news.show', ['notice' => $notice, 'author' => $author]);
        }else{
            return redirect()->route('forbiddenRoute');
        }

    }

    public function getStore()
    {
        return view('admin.news.register');
    }
}
