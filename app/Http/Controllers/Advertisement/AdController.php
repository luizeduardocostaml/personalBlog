<?php

namespace App\Http\Controllers\Advertisement;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditAdvertisementRequest;
use App\Advertisement;
use App\Http\Requests\StoreAdvertisementRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdController extends Controller
{

    public function store(StoreAdvertisementRequest $request)
    {
        $request->validated();

        $ad = new Advertisement();
        $count = DB::table('advertisements')->count();

        $ad->name = $request->name;
        $ad->link = $request->link;
        $ad->position = $count + 1;
        $ad->image = $request->image->store('img/upload', 's3');

        $ad->save();

        return redirect()->route('ad.panel')->with('success', 'Anúncio criado com sucesso!');
    }

    public function destroy($id)
    {
        if($ad = Advertisement::find($id)){
            Storage::disk('s3')->delete($ad->image);

            Advertisement::destroy($id);

            return redirect()->route('ad.panel')->with('success', 'Anúncio deletado com sucesso!');
        }else{
            return redirect()->route('ad.panel')->with('error', 'Anúncio inválido.');
        }
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
