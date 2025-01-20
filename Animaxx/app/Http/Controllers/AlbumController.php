<?php

namespace App\Http\Controllers;

use App\Models\TabelAlbum;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    function setAlbum($judul){
        $dt['album'] = TabelAlbum::with('genres')->where('judulUtama',$judul)->first();

        return view('album/album',[
            "dt" => $dt,
        ]);
    }
}
