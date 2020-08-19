<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ViewsController extends Controller
{
    public function getPerfil($id)
    {
        if($user = User::find($id)){
            return view('user.perfil', ['user' => $user]);
        }else{
            return back()->with('error', 'Usuário não encontrado.');
        }
    }

    public function getLogin()
    {
        try {
            $user = User::findOrFail(1);

            if (Auth::check()) {
                return redirect()->route('admin.panel');
            }
            return view('admin.user.login');
        } catch (ModelNotFoundException $e) {
            return view('admin.user.firstRegister');
        }
    }

    public function getRegister()
    {
        if (Auth::check()) {
            return view('admin.user.register');
        } else {
            try {
                $user = User::findOrFail(1);

                return redirect()->route('home');
            } catch (ModelNotFoundException $e) {
                return view('admin.user.firstRegister');
            }
        }
    }

    public function getChangePassword()
    {
        return view('admin.user.changePassword');
    }

    public function getEdit()
    {
        $user = Auth::user();

        $user->image = Storage::disk('s3')->url($user->image);

        return view('admin.user.edit', ['user' => $user]);
    }
}
