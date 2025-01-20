<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB; 
use App\Models\TabelGenre;
use Illuminate\Http\Request;
use App\Models\AlbumTabel;
use App\Models\TabelAlbum;

class MainMenuControler extends Controller
{
    function mainMenuDataReturn(){
        // album genre listlike listgenre
        $dt['album'] = TabelAlbum::with('genres')->get();
        
        $dt['listlike'] = DB::table('likelist as l')
        ->join('vidio as v', 'v.id', '=', 'l.idVidio')
        ->join('album as a', 'a.id', '=', 'v.album')
        ->select('a.judulUtama', DB::raw('count(a.judulUtama) as like_total'))
        ->groupBy('a.judulUtama')
        ->orderByDesc('like_total')
        ->get();

        // dd($dt['album']);
        return view('mainMenu.mainMenuHome',[
            "dt" => $dt
        ]);
    }

    function filter(Request $req){
        $filterTable = $req->input('filter');
        $dt['judul'] = $filterTable;
        if($filterTable == 'Home'){
            $dt['album'] = TabelAlbum::with('genres')->get();
        
            $dt['listlike'] = DB::table('likelist as l')
            ->join('vidio as v', 'v.id', '=', 'l.idVidio')
            ->join('album as a', 'a.id', '=', 'v.album')
            ->select('a.judulUtama', DB::raw('count(a.judulUtama) as like_total'))
            ->groupBy('a.judulUtama')
            ->orderByDesc('like_total')
            ->get();
        }
        else if($filterTable == 'PlayList'){

        }
        else if($filterTable == 'Movies'){

        }
        else{ // News

        }

        return response()->json([
            'dt' => $dt,
        ]);
    }
}
