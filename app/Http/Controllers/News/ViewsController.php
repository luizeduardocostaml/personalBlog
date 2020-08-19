<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Notice;

class ViewsController extends Controller
{
    public function getNews()
    {
        $notices = Notice::orderBy('created_at', 'DESC')->paginate(10);

        return view('news.index', ['notices' => $notices]);
    }

    public function getPanel()
    {
        $notices = Notice::orderBy('created_at', 'DESC')->get();

        return view('admin.news.panel', ['notices' => $notices]);
    }

    public function getEdit($id)
    {
        if ($notice = Notice::find($id)) {
            return view('admin.news.edit', ['notice' => $notice]);
        } else {
            return redirect()->route('news.panel')->with('error', 'Post inválido.');
        }
    }

    public function getNotice($id, $link)
    {
        if ($notice = Notice::find($id)) {
            $notice->views += 1;
            $notice->save();

            return view('news.show', ['notice' => $notice]);
        } else {
            return redirect()->route('forbiddenRoute');
        }
    }

    public function getStore()
    {
        return view('admin.news.register');
    }
}
