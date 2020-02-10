<?php

namespace App\Http\Controllers\Advertisement;

use App\Advertisement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewsController extends Controller
{

    public function getPanel()
    {
        $ads = DB::table('advertisements')->orderBy('position')->get();

        $count = DB::table('advertisements')->count();

        return view('admin.advertisement.panel', ['ads' => $ads, 'count' => $count]);
    }

    public function getEdit($id)
    {
        $ad = Advertisement::find($id);

        return view('admin.advertisement.edit', ['ad' => $ad]);
    }

    public function getStore()
    {
        return view('admin.advertisement.register');
    }
}
