<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeMessage;
use App\Message;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function index()
    {
        $messages = Message::all();

        return view('contato.index', ['messages' => $messages]);
    }

    public function store(storeMessage $request)
    {

        $request->validated();

        $mensagem = new Message();

        $mensagem->name = $request->name;
        $mensagem->email = $request->email;
        $mensagem->title = $request->title;
        $mensagem->text = $request->text;

        $mensagem->save();

        return redirect()->route('enviarMensagem');
    }
}
