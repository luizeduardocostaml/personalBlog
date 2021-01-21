<?php

namespace App\Http\Controllers;

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

class AuthorController extends Controller
{
    public function show($slug)
    {
        if ($user = User::where('slug', $slug)->first()) {
            return view('user.perfil', ['user' => $user]);
        } else {
            return back()->with('error', 'Usuário não encontrado.');
        }
    }
}
