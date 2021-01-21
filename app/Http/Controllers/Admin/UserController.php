<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\EditUserRequest;
use App\Jobs\CreateLog;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('id', '>', 1)->get();

        return view('admin.user.index', ['users' => $users]);
    }

    public function edit()
    {
        $user = Auth::user();

        $user->image = Storage::disk('s3')->url($user->image);

        return view('admin.user.edit', ['user' => $user]);
    }

    public function update(EditUserRequest $request)
    {
        if (Auth::id() !== $request->id && Auth::user()->role !== 'admin') {
            return redirect()->route('admin.index')->with('error', 'Você não possui autorização para fazer isso!');
        }

        $request->validated();

        $user = Auth::user();

        $user->name = $request->name;
        $user->slug = Str::slug($request->name);
        $user->biography = $request->biography;

        if ($request->has('image')) {
            Storage::disk('s3')->delete($user->image);
            $user->image = $request->image->store('img/upload', 's3');
        }

        $user->save();

        if (Auth::check()) {
            return redirect()->route('admin.user.edit')->with('success', 'Dados alterados com sucesso!');
        } else {
            return redirect()->route('user.login');
        }
    }

    public function destroy($id)
    {
        if ($id === 1) {
            return redirect()->route('admin.user.index')->with('error', 'Usuário inválido.');
        } elseif ($user = User::find($id)) {
            Storage::disk('s3')->delete($user->image);

            User::destroy($id);
            CreateLog::dispatch('Usuário', 'delete', $id, Auth::id());

            return redirect()->route('admin.user.index')->with('success', 'O usuário foi apagado com sucesso!');
        } else {
            return redirect()->route('admin.user.index')->with('error', 'Usuário inválido.');
        }
    }

    public function getChangePassword()
    {
        return view('admin.user.changePassword');
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

            return redirect()->route('admin.user.index')->with('success', 'A senha foi alterada com sucesso!');
        } else {
            return redirect()->route('admin.user.change-password.create');
        }
    }
}
