<?php
namespace App\Http\Controllers;

use App\Models\AlbumTabel;
use App\Models\GenreList;
use App\Models\TabelGenre;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
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

}
