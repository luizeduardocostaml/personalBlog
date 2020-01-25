<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeMessage;
use App\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $messages = Message::all();

        return view('contact.panel', ['messages' => $messages]);
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

        return redirect()->route('contact.getRegister')->with('success', 'A mensagem foi enviada com sucesso!');
    }

    public function destroy($id)
    {
        Message::destroy($id);

        return redirect()->route('contact.panel')->with('success', 'A mensagem foi deletada com sucesso!');
    }

    public function getMessage($id)
    {
        $message = Message::find($id);

        return view('contact.show', ['message'=> $message]);
    }
}
