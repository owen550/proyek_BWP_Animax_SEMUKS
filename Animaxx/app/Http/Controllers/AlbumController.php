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
    function setAlbum($judul)
    {
        $dt['album'] = TabelAlbum::with('genres')->where('judulUtama', $judul)->first();
        $idVidio = $dt['album']->id;
        $dt['vidio'] = TabelVidio::where(["album" => $idVidio])->first();

        return view('album/album', [
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
            'judulTambahan' => 'nullable|string|max:255',
            'statusTamat' => 'required|boolean',
            'releaseDate' => 'nullable|date',
            'studioID' => 'required|integer|max:10',
            'deskripsi' => 'required|string|max:100',
            'imageAlbum' => 'required|url', // Validasi hanya menerima URL
            'imageHorizontal' => 'required|url', // Validasi hanya menerima URL
            'genre' => 'required|array|min:1|max:3',
            'genre.*' => 'exists:genre,id',
        ]);

        // Simpan gambar jika ada
        if ($request->hasFile('imageAlbum')) {
            $validated['imageAlbum'] = $request->file('imageAlbum')->store('albums', 'public');
        }

        if ($request->hasFile('imageHorizontal')) {
            $validated['imageHorizontal'] = $request->file('imageHorizontal')->store('albums', 'public');
        }

        // Simpan data album
        $album = AlbumTabel::create([
            'judulUtama' => $validated['judulUtama'],
            'judulTambahan' => $validated['judulTambahan'],
            'statusTamat' => $validated['statusTamat'],
            'releaseDate' => $validated['releaseDate'],
            'studioID' => $validated['studioID'],
            'deskripsi' => $validated['deskripsi'],
            'imageAlbum' => $validated['imageAlbum'] ?? null,
            'imageHorizontal' => $validated['imageHorizontal'] ?? null,
        ]);

        // Simpan data genrelist
        foreach ($validated['genre'] as $genreId) {
            GenreList::create([
                'idAlbum' => $album->id,
                'idGenre' => $genreId,
            ]);
        }

        // Redirect dengan pesan sukses
        return redirect()->route('uploadAlbum.create')->with('success', 'Album berhasil diupload!');
    }
}
