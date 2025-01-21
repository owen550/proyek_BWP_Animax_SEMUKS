<?php

namespace App\Http\Controllers;

use App\Models\TabelVidio;
use Illuminate\Support\Facades\DB; 
use App\Models\TabelGenre;
use Illuminate\Http\Request;
use App\Models\AlbumTabel;
use App\Models\TabelAlbum;

class MainMenuControler extends Controller
{
    function mainMenuDataReturn(){
        // album genre listlike listgenre
        $dt['album'] = TabelAlbum::with(['genres','studios'])->get();
        
        $dt['vidio'] = DB::table('vidio as v')
        ->join('album as a', 'a.id', '=', 'v.album')
        ->select('v.id', 'v.judul', 'v.relaseDate', 'v.vidioURL', 'a.imageAlbum', 'v.tipe')
        ->orderBy('v.relaseDate','DESC')
        ->get();
        
        $dt['listlike'] = DB::table('likelist as l')
        ->join('vidio as v', 'v.id', '=', 'l.idVidio')
        ->join('album as a', 'a.id', '=', 'v.album')
        ->select('a.id', 'a.judulUtama', DB::raw('count(l.idVidio) as like_total')) // Menggunakan l.idVidio untuk menghitung like
        ->groupBy('a.id', 'a.judulUtama') // Menambahkan a.id di sini
        ->orderByDesc('like_total')
        ->get();

        $id = $dt['listlike']->first(); // menemukan id album fav
        $dtA = TabelAlbum::with(['studios','genres'])->where(['id' => $id->id])->first();
        $status = null;

        if($dtA->statusTamat == 1){
            $status = 'Tamat';
        }
        else{
            $status = "Belum Tamat";
        }
        // algoritma pencari most popular anime
        $dt['pop'] = [
            'judulUtama' => $dtA->judulUtama,
            'judulTambahan' => $dtA->judulTambahan,
            'Status' => $status,
            'relaseDate' => $dtA->releaseDate,
            'Studio' => $dtA->studios->namaStudio,
            'image' => $dtA->imageAlbum,
        ];

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
            $dt['playlist'] = DB::table('playlist as p')
            ->join('vidio as v', 'v.id', '=', 'p.idVidio')
            ->join('album as a', 'a.id', '=', 'v.id') // Menambahkan join untuk tabel album
            ->select('p.idVidio', 'v.judul', 'a.imageAlbum') // Memilih kolom yang sesuai
            ->where('p.STATUS', 1)
            ->where('p.idUser', session('idUser'))
            ->get();
        }
        else if($filterTable == 'Movies'){
            $dt['news'] = DB::table('news')
            ->select('judul', 'deskripsi')
            ->get();
        }
        else if ($filterTable == 'News') {
            $dt['news'] = DB::table('news')
                ->select('judul', 'deskripsi', 'url', 'imageURL')
                ->get();
        }
        else{ // News
            
        }

        return response()->json([
            'dt' => $dt,
        ]);
    }
}
