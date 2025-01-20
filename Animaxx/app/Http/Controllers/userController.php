<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserTabel; // Pastikan model yang digunakan adalah UserTabel

class UserController extends Controller
{
    // Menampilkan semua data users
    public function showUsers()
    {
        $users = UserTabel::all(); // Mengambil semua data dari tabel users
        return view('profile.lihatUsers', compact('users'));
    }

    // Mengupdate status user
    public function updateUserStatus(Request $request, $id)
    {
        $user = UserTabel::findOrFail($id); // Cari user berdasarkan ID

        // Ubah status: jika 0 jadi 1, jika 1 jadi 0
        $user->status = $user->status == 0 ? 1 : 0;
        $user->save(); // Simpan perubahan ke database

        return response()->json([
            'success' => true,
            'newStatus' => $user->status,
        ]);
    }
}
