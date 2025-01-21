<?php
namespace App\Http\Controllers;

use App\Models\AlbumTabel;
use App\Models\GenreList;
use App\Models\TabelGenre;
use Illuminate\Http\Request;
use App\Models\TabelAlbum;
use App\Models\TabelVidio;

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

    public function create()
{
    // Ambil data genre untuk ditampilkan di form
    $genres = TabelGenre::all(); // Pastikan Anda memiliki model Genre
    return view('profile.uploadAlbum', compact('genres'));
}

public function store(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'judulUtama' => 'required|string|max:255',
        'judulTambahan' => 'nulllable|string|max:255',
        'statusTamat' => 'required|boolean',
        'releaseDate' => 'nullable|date',
        'studioID' => 'required|integer|max:10',
        'deskripsi' => 'required|string|max:100',
        'imageAlbum' => 'required|url',
        'imageHorizontal' => 'required|url',
        'genre' => 'required|array|min:1|max:3', // Validasi genre sebagai array
        'genre.*' => 'exists:genre,id' // Pastikan setiap genre ada di tabel genre
    ]);

    // Simpan data album
    $album = AlbumTabel::create([
        'judulUtama' => $validated['judulUtama'],
        'judulTambahan' => $validated['judulTambahan'],
        'statusTamat' => $validated['statusTamat'],
        'releaseDate' => $validated['releaseDate'],
        'studioID' => $validated['studioID'],
        'deskripsi' => $validated['deskripsi'],
        'imageAlbum' => $validated['imageAlbum'],
        'imageHorizontal' => $validated['imageHorizontal'],
    ]);

    // Simpan data genrelist
    foreach ($validated['genre'] as $genreId) {
        GenreList::create([
            'idAlbum' => $album->id,
            'idGenre' => $genreId,
        ]);
    }

    return redirect()->route('uploadAlbum.create')->with('success', 'Album berhasil diupload!');
}

    {
        return view('profile.uploadAlbum');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judulUtama' => 'required|string',
            'judulTambahan' => 'nullable|string',
            'statusTamat' => 'required|boolean',
            'releaseDate' => 'nullable|date',
            'studioID' => 'required|integer|max:10',
            'deskripsi' => 'required|string|max:100',
            'imageAlbum' => 'required|url',
            'imageHorizontal' => 'required|url',
        ]);

        if ($request->hasFile('imageAlbum')) {
            $validatedData['imageAlbum'] = $request->file('imageAlbum')->store('albums', 'public');
        }

        if ($request->hasFile('imageHorizontal')) {
            $validatedData['imageHorizontal'] = $request->file('imageHorizontal')->store('albums', 'public');
        }

        // Simpan ke database menggunakan model Album
        AlbumTabel::create($validatedData);

        return redirect()->route('upload.album')->with('success', 'Album berhasil diunggah!');
    }
}
