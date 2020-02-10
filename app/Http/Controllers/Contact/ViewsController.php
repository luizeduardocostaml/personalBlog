<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;

class ViewsController extends Controller
{
    public function getPanel()
    {
        $messages = Message::all();

        return view('admin.contact.panel', ['messages' => $messages]);
    }

    public function getMessage($id)
    {
        $message = Message::find($id);

        return view('admin.contact.show', ['message'=> $message]);
    }

    public function getStore()
    {
        return view('contact.contact');
    }
}
