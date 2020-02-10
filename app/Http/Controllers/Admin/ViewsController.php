<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewsController extends Controller
{
    public function getPanel()
    {
        return view('admin.index');
    }

    public function getUserPanel()
    {
        $users = User::where('id', '>', 1)->get();

        return view('admin.userPanel', ['users' => $users]);
    }
}
