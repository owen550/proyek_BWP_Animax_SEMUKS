<?php

namespace App\Http\Controllers;

use App\Models\TabelAlbum;
use App\Models\TabelVidio;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    function setAlbum($judul){
        $dt['album'] = TabelAlbum::with('genres')->where('judulUtama',$judul)->first();
        $idVidio = $dt['album']->id;
        $dt['vidio'] = TabelVidio::where(["album" => $idVidio])->first();

        return view('album/album',[
            "dt" => $dt,
        ]);
    }
}
