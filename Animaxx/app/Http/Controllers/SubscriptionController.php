<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\UserTabel;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
     // Menampilkan halaman dashboard
     public function dashboard()
     {
         $user = Auth::user(); // Mendapatkan pengguna yang sedang login
         return view('profile.dashboard', compact('user'));
     }
 
     // Menampilkan halaman langganan
     public function showSubscriptionPage()
     {
         return view('profile.subscription');
     }
 
     // Proses langganan
     public function subscribe(Request $request)
     {
         // Memastikan pengguna sudah login
         if (Auth::check()) {
             $user = Auth::user();
 
             // Validasi jika data paket ada
             $request->validate([
                 'package' => 'required|in:1 bulan,6 bulan,12 bulan',
             ]);
 
             // Update status member
             $user->member = 1; // Set member sebagai 1 (berlangganan)
             $user->save();
 
             // Menyimpan transaksi langganan
             Transaction::create([
                 'user_id' => $user->id,
                 'package' => $request->package,
                 'price' => $this->getPackagePrice($request->package), // Sesuaikan harga dengan paket yang dipilih
             ]);
 
             // Redirect ke halaman dashboard setelah langganan
             return redirect()->route('dashboard')->with('status', 'Berlangganan berhasil!');
         } else {
             // Jika pengguna belum login, arahkan ke halaman login
             return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
         }
     }
 
     // Menentukan harga berdasarkan paket yang dipilih
     private function getPackagePrice($package)
     {
         switch ($package) {
             case '1 bulan':
                 return 50000;
             case '6 bulan':
                 return 250000;
             case '12 bulan':
                 return 500000;
             default:
                 return 0;
         }
     }
}


