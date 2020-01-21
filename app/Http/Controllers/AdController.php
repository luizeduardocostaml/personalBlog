<?php

namespace App\Http\Controllers;

use App\Traits\AdvertisementTraits;
use App\Advertisement;
use App\Http\Requests\editAdvertisement;
use App\Http\Requests\storeAdvertisement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdController extends Controller
{
    use AdvertisementTraits;

    public function adPanel()
    {
        $ads = Advertisement::all();

        $count = DB::table('advertisements')->count();

        return view('advertisement.panel', ['ads' => $ads, 'count' => $count]);
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

    public function destroy($id)
    {
        $ad = Advertisement::find($id);

        Storage::delete($ad->image);

        Advertisement::destroy($id);

        return redirect()->route('adPanel');
    }

    public function getEditAdvertisement($id)
    {
        $ad = Advertisement::find($id);

        return view('advertisement.edit', ['ad' => $ad]);
    }

    public function edit(editAdvertisement $request)
    {
        $request->validated();

        $ad = Advertisement::find($request->id);

        $ad->name = $request->name;
        $ad->link = $request->link;

        $ad->save();

        return redirect()->route('adPanel');
    }

    public function upPosition($id)
    {
        $ad = Advertisement::find($id);

        if($ad->position == 1){
            return redirect()->route('adPanel');
        }else{
            $ad->position = $ad->position - 1;
            $ad2 = DB::select('select * from advertisements where position = :position', ['position' => $ad->position]);
            $ad2->position = $ad2->position + 1;

            $ad->save();
            $ad2->save();

            return redirect()->route('adPanel');
        }
    }

    public function downPosition($id)
    {
        $ad = Advertisement::find($id);

        $count = DB::table('advertisements')->count();

        if($ad->position == $count){
            return redirect()->route('adPanel');
        }else{
            $ad->position = $ad->position + 1;
            $ad2 = DB::select('select * from advertisements where position = :position', ['position' => $ad->position]);
            $ad2->position = $ad2->position - 1;

            $ad->save();
            $ad2->save();

            return redirect()->route('adPanel');
        }
    }
}
