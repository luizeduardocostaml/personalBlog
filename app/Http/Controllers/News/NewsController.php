<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditNewsRequest;
use App\Http\Requests\StoreNewsRequest;
use App\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function store(StoreNewsRequest $request)
    {
        $request->validated();

        $notice = new Notice;

        $notice->title = $request->title;
        $notice->resume = $request->resume;
        $notice->text = $request->text;
        $notice->image = $request->image->store('img/upload', 's3');
        $notice->author_id = Auth::id();
        $notice->views = 0;

        $notice->save();

        return redirect()->route('news.panel')->with('success', 'Post criado com sucesso!');
    }

    public function destroy($id)
    {
        if($notice = Notice::find($id)){
            Storage::disk('s3')->delete($notice->image);

            Notice::destroy($id);

            return redirect()->route('news.panel')->with('success', 'Notícia deletada com sucesso!');
        }else{
            return redirect()->route('news.panel')->with('error', 'Noticia inválida.');
        }


    }

    public function edit(EditNewsRequest $request)
    {
        $request->validated();

        $notice = Notice::find($request->id);

        $notice->title = $request->title;
        $notice->resume = $request->resume;
        $notice->text = $request->text;

        $notice->save();

        return redirect()->route('news.panel')->with('success', 'Notícia editada com sucesso!');
    }
}
