<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthUserRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\StoreUserRequest;
use App\User;
use App\Http\Requests\EditUserRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
                return redirect()->route('admin.panel');
            }
            return view('admin.user.login');
        } catch (ModelNotFoundException $e) {
            return view('admin.user.firstRegister');
        }
    }

    public function authenticate(AuthUserRequest $request)
    {
        $request->validated();

        $username = $request->username;
        $password = $request->password;

        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            return redirect()->route('admin.panel');
        } else {
            return redirect()->route('user.getLogin');
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

        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->name = $request->name;
        $user->role = $request->role;
        $user->biography = $request->biography;
        $user->image = $request->image->store('img/upload', 's3');

        $user->save();

        if (Auth::check()) {
            return redirect()->route('admin.userPanel')->with('success', 'O usuário foi criado com sucesso!');
        } else {
            return redirect()->route('user.getLogin');
        }
    }
}
