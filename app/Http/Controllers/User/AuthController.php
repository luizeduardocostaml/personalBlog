<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthUserRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\StoreUserRequest;
use App\User;
use App\Http\Requests\EditUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{

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

    public function register(StoreUserRequest $request)
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

        if(Auth::check()){
            return redirect()->route('admin.userPanel')->with('success', 'O usuário foi criado com sucesso!');
        }else{
            return redirect()->route('user.getLogin');
        }
    }

    public function edit(EditUserRequest $request)
    {
        if(Auth::id() != $request->id){
            return redirect()->route('admin.panel')->with('error', 'Você não possui autorização para fazer isso!');
        }

        $request->validated();

        $user = Auth::user();

        $user->username = $request->username;
        $user->name = $request->name;
        $user->biography = $request->biography;

        if($request->has('image')){
            Storage::disk('s3')->delete($user->image);
            $user->image = $request->image->store('img/upload', 's3');
        }

        $user->save();

        if(Auth::check()){
            return redirect()->route('user.getEdit')->with('success', 'Dados alterados com sucesso!');
        }else{
            return redirect()->route('user.getLogin');
        }
    }

    public function changePassword(ChangePasswordRequest $request)
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
            return redirect()->route('user.getChangePassword');
        }
    }

    public function destroy($id)
    {
        if($id === 1){
            return redirect()->route('admin.userPanel')->with('error', 'Usuário inválido.');
        }elseif($user = User::find($id)){

            Storage::disk('s3')->delete($user->image);

            User::destroy($id);

            return redirect()->route('admin.userPanel')->with('success', 'O usuário foi apagado com sucesso!');
        }else{
            return redirect()->route('admin.userPanel')->with('error', 'Usuário inválido.');
        }
    }
}
