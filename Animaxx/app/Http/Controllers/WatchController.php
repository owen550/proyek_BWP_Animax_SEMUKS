<?php

namespace App\Http\Controllers;

use App\Models\TabelKomentar;
use App\Models\TabelLikelist;
use App\Models\TabelVidio;
use Illuminate\Http\Request;
use Session;

class WatchController extends Controller
{
    function addKomen(Request $req){
        $komen = $req->input('komen');
        
        // add ke db
        $do = TabelKomentar::create([
            'idUser' => session('idUser'),
            'idVidio' => session('idVid'),
            'isiKomentar' => $komen,
        ]);

        return response()->json([
            'komen' => $komen
        ]);
    }

    function setWatch($judul) {
        $dt['vidio'] = TabelVidio::where(['judul' => $judul])->first();
    
        // Cek jika video ditemukan
        if (!$dt['vidio']) {
            return redirect()->back()->with('error', 'Video tidak ditemukan.');
        }
    
        $idVid = $dt['vidio']->idVidio;
        $idUser = session('idUser'); // Ambil idUser dari session
        Session::put('idVid', $idVid);
    
        $dt['komen'] = TabelKomentar::where(['idVidio' => $idVid])->get();
        $dt['vidioall'] = TabelVidio::all();
    
        $dt['likelist'] = TabelLikelist::where([
            'idVidio' => $idVid,
            'idUser' => $idUser,
        ])->first();
    
        return view('watch.watch', [
            'dt' => $dt,
        ]);
    }
}
