<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserTabel;
use Illuminate\Support\Facades\Hash;
use Session;

class loginRegisterControler extends Controller
{
    // Tambahkan method untuk menampilkan halaman login
    public function showLogin()
    {
        return view('login');
    }

    // Tambahkan method untuk menampilkan halaman register
    public function showRegister()
    {
        return view('register');
    }

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
            // add data dengan password yang di-hash
            UserTabel::create([
                'email' => $email,
                'nama' => $nama,
                'username' => $username,
                'password' => Hash::make($password),
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

        // Menggunakan Auth untuk login
        $credentials = [
            'username' => $username,
            'password' => $password
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            if($user->status == 0){
                Auth::logout();
                return redirect('/')->with('pesan','Akun Anda Telah Diblokir Oleh Admin !!!');
            }

            // Regenerate session untuk keamanan
            $req->session()->regenerate();

            // Simpan data di session
            Session::put('idUser', $user->id);
            Session::put('email', $user->email);
            Session::put('nama', $user->nama);
            Session::put('username', $user->username);
            Session::put('password', $user->password);
            Session::put('imageURL', $user->imageURL);
            Session::put('member', $user->member);

            return redirect('/main/home');
        }

        return redirect('/')->with('pesan','Username atau Password Salah !!!');
    }

    // Tambahkan fungsi logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Session::flush(); // Hapus semua session

        return redirect('/');
    }
} 