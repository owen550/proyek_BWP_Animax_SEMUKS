<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserTabel;
use Session;

class loginRegisterControler extends Controller
{

    function register(Request $req){
        $email = $req->edEmail;
        $nama = $req->edNama;
        $username = $req->edUsername;
        $password = $req->edPassword;
        
        $validation = $req->validate([
            'edEmail' => "required|email",
            'edNama' => "required",
            'edUsername' => "required|min:5",
            'edPassword' => "required|min:5",
        ], [
            'edEmail.required' => 'Email wajib diisi.',
            'edEmail.email' => 'Format email tidak valid.',
            'edNama.required' => 'Nama wajib diisi.',
            'edUsername.required' => 'Username wajib diisi.',
            'edUsername.min' => 'Username minimal 5 karakter.',
            'edPassword.required' => 'Password wajib diisi.',
            'edPassword.min' => 'Password minimal 5 karakter.',
        ]);

        

        // lakukan pengecekan apakah username sama
        $data = UserTabel::where('username',$username)->first();
        if($data){
            // nama udah kepakek
            return redirect('/register')->with('pesan','Username Telah Digunakan !!!');
        }
        else{
            // add data
            UserTabel::create([
                'email' => $email,
                'nama' => $nama,
                'username' => $username,
                'password' => $password,
                'imageURL' => 'https://teknogram.id/gallery/foto-profil-wa/aesthetic/pp-wa-kosong-aesthetic-2.jpg',
                'member' => '0',
                'status' => '1'
            ]);
            return redirect('/')->with('kusus','Berhasil Membuat Akun Silahkan Login !!!');
        }
    }

    function login(Request $req){
        $username = $req->edUsername;
        $password = $req->edPassword;

        // validasi dulu
        $validation = $req->validate([
            'edUsername' => 'required|min:5',
            'edPassword' => 'required|min:5',
        ], [
            'edUsername.required' => 'Username wajib diisi.',
            'edPassword.required' => 'Password wajib diisi.',
            'edUsername.min' => 'Username minimal 5 karakter.',
            'edPassword.min' => 'Password minimal 5 karakter.',
        ]);

      
        // cek ada atau tidak
        $result = UserTabel::where('username',$username)->where('password',$password)->first();
        // return
        if($result){

            if($result->status == 0){
                return redirect('/')->with('pesan','Akun Anda Telah Diblokir Oleh Admin !!!');
            }
            else{
                // simpan semua data
                Session::put('idUser',$result->id);
                Session::put('email',$result->email);
                Session::put('nama',$result->nama);
                Session::put('username',$result->username);
                Session::put('password',$result->password);
                Session::put('imageURL',$result->imageURL);
                Session::put('member',$result->member);
                // pergi ke main home
                return redirect('/main/home');
            }
        }
        else{
            return redirect('/')->with('pesan','Username atau Password Salah !!!');
        }
    }

    
    }

