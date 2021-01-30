<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function create()
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

    public function login()
    {
        try {
            $user = User::findOrFail(1);

            if (Auth::check()) {
                return redirect()->route('admin.index');
            }
            return view('admin.user.login');
        } catch (ModelNotFoundException $e) {
            return view('admin.user.firstRegister');
        }
    }

    public function authenticate(AuthUserRequest $request)
    {
        $request->validated();

        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route('admin.index');
        } else {
            return redirect()->route('user.auth');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }

    public function store(StoreUserRequest $request)
    {
        $request->validated();

        $user = new User;

        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->name = $request->name;
        $user->slug = Str::slug($request->name);
        $user->role = $request->role;
        $user->biography = $request->biography;
        $user->image = $request->image->store('img/upload', 's3');

        $user->save();

        if (Auth::check()) {
            return redirect()->route('admin.user.index')->with('success', 'O usuário foi criado com sucesso!');
        } else {
            return redirect()->route('user.login');
        }
    }
}
