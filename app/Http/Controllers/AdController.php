<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\Http\Requests\storeAdvertisement;
use http\Env\Request;

class AdController extends Controller
{
    public function adPanel()
    {
        $ads = Advertisement::all();

        return view('advertisement.panel', ['ads' => $ads]);
    }

    public function store(storeAdvertisement $request)
    {
        $request->validated();

        $ad = new Advertisement();

        $ad->name = $request->name;
        $ad->link = $request->link;
        $ad->position = $request->position;
        $ad->image = $request->image->store('public/img/upload');

        $ad->save();

        return redirect()->route('adPanel');
    }
}
