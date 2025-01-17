<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserTabel;

class ProfileControler extends Controller
{
    function editProfil(Request $req){
        $imageURL = $req->edImage;
        $email = $req->edEmail;
        $nama = $req->edNama;
        $username = $req->edUsername;
        $password = $req->edPassword;

        $validation = $req->validate([
            'edImage' => "required",
            'edEmail' => "required|email",
            'edNama' => "required",
            'edUsername' => "required|min:5",
            'edPassword' => "required|min:5",
        ], [
            'edImage.required' => 'Image wajib diisi.',
            'edEmail.required' => 'Email wajib diisi.',
            'edEmail.email' => 'Format email tidak valid.',
            'edNama.required' => 'Nama wajib diisi.',
            'edUsername.required' => 'Username wajib diisi.',
            'edUsername.min' => 'Username minimal 5 karakter.',
            'edPassword.required' => 'Password wajib diisi.',
            'edPassword.min' => 'Password minimal 5 karakter.',
        ]);

        // update data
        $cek = UserTabel::where('username',$username)->first();
        if($cek && session('username') != $username){
            return redirect('/main/profile/' . session('memberStatus'))->with('pesan','Username Telah Digunakan');
        }
        else{
            $user = UserTabel::find(session('idUser'));
            if($user){
                $user -> update([
                    'imageURL' => $imageURL,
                    'email' => $email,
                    'nama' => $nama,
                    'username' => $username,
                    'password' => $password,
                ]);
            }
            return redirect('/')->with('kusus','Berhasil Mengubah Informasi Akun !!!');
        }
    }
}
