<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewsController extends Controller
{

    public function getLogin()
    {
        try {
            $user = User::findOrFail(1);

            if(Auth::check()){
                return redirect()->route('admin.panel');
            }
            return view('admin.user.login');
        } catch (ModelNotFoundException $e) {
            return view('admin.user.firstRegister');
        }
    }

    public function getRegister()
    {
        if(Auth::check()){
            return view('admin.user.register');
        }else{
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
}
