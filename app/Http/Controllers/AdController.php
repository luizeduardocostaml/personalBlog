<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditAdvertisementRequest;
use App\Traits\AdvertisementTraits;
use App\Advertisement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdController extends Controller
{
    use AdvertisementTraits;

    public function adPanel()
    {
        $ads = DB::table('advertisements')->orderBy('position')->get();

        $count = DB::table('advertisements')->count();

        return view('advertisement.panel', ['ads' => $ads, 'count' => $count]);
    }

    public function store(StoreAdvertisementRequest $request)
    {
        $request->validated();

        $ad = new Advertisement();
        $count = DB::table('advertisements')->count();

        $ad->name = $request->name;
        $ad->link = $request->link;
        $ad->position = $count + 1;
        $ad->image = $request->image->store('public/img/upload');

        $ad->save();

        return redirect()->route('ad.panel')->with('success', 'Anúncio criado com sucesso!');
    }

    public function destroy($id)
    {
        $ad = Advertisement::find($id);

        Storage::delete($ad->image);

        Advertisement::destroy($id);

        return redirect()->route('ad.panel')->with('success', 'Anúncio deletado com sucesso!');
    }

    public function getEditAdvertisement($id)
    {
        $ad = Advertisement::find($id);

        return view('advertisement.edit', ['ad' => $ad]);
    }

    public function edit(EditAdvertisementRequest $request)
    {
        $request->validated();

        $ad = Advertisement::find($request->id);

        $ad->name = $request->name;
        $ad->link = $request->link;

        $ad->save();

        return redirect()->route('ad.panel')->with('success', 'Anúncio editado com sucesso!');
    }

    public function upPosition($id)
    {
        $ad = Advertisement::find($id);

        if ($ad->position == 1) {
            return redirect()->route('ad.panel');
        } else {
            $ad->position = $ad->position - 1;
            $ads = DB::select('select * from advertisements where position = ?', [$ad->position]);
            $id2 = $ads[0]->id;
            $ad2 = Advertisement::find($id2);
            $ad2->position = $ad2->position + 1;

            $ad->save();
            $ad2->save();

            return redirect()->route('ad.panel');
        }
    }

    public function downPosition($id)
    {
        $ad = Advertisement::find($id);

        $count = DB::table('advertisements')->count();

        if ($ad->position == $count) {
            return redirect()->route('ad.panel');
        } else {
            $ad->position = $ad->position + 1;
            $ads = DB::select('select * from advertisements where position = ?', [$ad->position]);
            $id2 = $ads[0]->id;
            $ad2 = Advertisement::find($id2);
            $ad2->position = $ad2->position - 1;

            $ad->save();
            $ad2->save();

            return redirect()->route('ad.panel');
        }
    }
}
