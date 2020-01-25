<?php

namespace App\Http\Controllers;

use App\Http\Requests\authUser;
use App\Http\Requests\changePassword;
use App\Http\Requests\registerUser;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function loginView()
    {
        try {
            $user = User::findOrFail(1);

            return view('admin.login');
        } catch (ModelNotFoundException $e) {
            return view('admin.register');
        }
    }

    public function authenticate(authUser $request)
    {
        $request->validated();

        $username = $request->username;
        $password = $request->password;

        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            return redirect()->route('admin.panel');
        } else {
            return redirect()->route('admin.getLogin');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }

    public function register(registerUser $request)
    {
        $request->validated();

        $user = new User;

        $user->username = $request->username;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->route('admin.getLogin');
    }

    public function registerView()
    {
        try {
            $user = User::findOrFail(1);

            return redirect()->route('home');
        } catch (ModelNotFoundException $e) {
            return view('admin.register');
        }
    }

    public function changePassword(changePassword $request)
    {
        $oldPassword = $request->oldPassword;
        $newPassword = $request->newPassword;

        $id = Auth::id();
        $user = User::find($id);

        if (Hash::check($oldPassword, $user->password)) {
            $user->password = Hash::make($newPassword);
            $user->save();

            return redirect()->route('admin.panel')->with('success', 'A senha foi alterada com sucesso!');
        } else {
            return redirect()->route('admin.getChangePassword');
        }
    }
}
