<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index()
    {
        $messages = Message::all();

        return view('admin.contact.panel', ['messages' => $messages]);
    }

    public function show($id)
    {
        if($message = Message::find($id)){
            return view('admin.contact.show', ['message'=> $message]);
        }else{
            return redirect()->route('contact.panel')->with('error', 'Mensagem inválida.');
        }
    }

    public function destroy($id)
    {
        if(Message::destroy($id)){
            return redirect()->route('contact.panel')->with('success', 'A mensagem foi deletada com sucesso!');
        }else{
            return redirect()->route('contact.panel')->with('error', 'Mensagem inválida.');
        }
    }

    public function answer(Request $request, $id)
    {
        $answer = $request->answer;
        $message = Message::find($id);

        $message->answer = $answer;

        Mail::to($message->email)->send(new AnswerMessage($message, $answer));

        $message->save();

        return redirect()->route('contact.panel')->with('success', 'A resposta foi enviada com sucesso!');
    }
}
