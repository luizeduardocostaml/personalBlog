<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessageRequest;
use App\Mail\AnswerMessage;
use App\Message;
use App\Notifications\NewMessage;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact.form');
    }

    public function store(StoreMessageRequest $request)
    {
        $request->validated();

        $message = new Message();

        $message->name = $request->name;
        $message->email = $request->email;
        $message->title = $request->title;
        $message->text = $request->text;
        $message->answer = ' ';

        $message->save();

        $user = User::find(1);
        $user->notify(new NewMessage($message));

        return redirect()->route('contact.create')->with('success', 'A mensagem foi enviada com sucesso!');
    }
}
