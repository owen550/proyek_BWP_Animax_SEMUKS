<?php
namespace App\Http\Controllers;

use App\Models\AlbumTabel;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function create()
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
