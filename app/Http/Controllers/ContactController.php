<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Message;
use App\Notifications\NewMessage;
use App\User;

class ContactController extends Controller
{
    public function index()
    {
        $messages = Message::all();

        return view('contact.panel', ['messages' => $messages]);
    }

    public function store(StoreMessageRequest $request)
    {

        $request->validated();

        $message = new Message();

        $message->name = $request->name;
        $message->email = $request->email;
        $message->title = $request->title;
        $message->text = $request->text;

        $message->save();

        $user = User::find(1);
        $user->notify(new NewMessage($message));

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
