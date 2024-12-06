<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHuizenRequest;
use App\Http\Requests\UpdateHuizenRequest;
use App\Models\Huizen;

class HuizenController extends Controller
{
    public function getHuizenPagina()
    {
        $huizen = Huizen::all();

        // Decode the JSON fotos field to an array of images
        foreach ($huizen as $huis) {
            $huis->fotos = json_decode($huis->fotos);
        }
        return view('pages/huizen', ['huizen' => $huizen]);
    }
    public function getHuisPagina($id)
    {
        $huis = Huizen::find($id);
        $huis->fotos = json_decode($huis->fotos);
        return view('pages/huis', ['huis' => $huis]);
    }
}
