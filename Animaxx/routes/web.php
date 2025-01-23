<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\loginRegisterControler;
use App\Http\Controllers\MainMenuControler;
use App\Http\Controllers\ProfileControler;
use App\Http\Controllers\WatchController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;

// untuk model
use App\Models\TabelAlbum;
use App\Models\TabelGenre;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route untuk guest (belum login)
Route::middleware('guest')->group(function() {
    Route::get('/', [loginRegisterControler::class, 'showLogin'])->name('login');
    Route::get('/register', [loginRegisterControler::class, 'showRegister']);
    Route::post('/register', [loginRegisterControler::class, 'register']);
    Route::post('/login', [loginRegisterControler::class, 'login']);
});

// Route untuk user yang sudah login (user dan admin)
Route::middleware(['auth', 'checkStatus'])->group(function() {
    Route::get('/logout', [loginRegisterControler::class, 'logout']);
    
    // Route general untuk user dan admin
    Route::get('/main/home',[MainMenuControler::class,'mainMenuDataReturn']);
    Route::get('/album/{id}',[AlbumController::class,'setAlbum']);
    Route::get('/watch/{id}',[WatchController::class,'setWatch']);
    Route::post('/main/profile/ubah',[ProfileControler::class,'editProfil']);
    Route::get('/main/home/filter',[MainMenuControler::class,'filter']);
    Route::get('/addkomen',[WatchController::class,'addKomen']);
    
    // Route khusus user (member == 0)
    Route::middleware('user')->group(function() {
        Route::get('/main/profile/user', function() {
            return view('profile/userProfile');
        });
    });
    
    // Route khusus admin (member == 2)
    Route::middleware('admin')->group(function() {
        Route::get('/main/profile/admin', function() {
            return view('profile/adminProfile');
        });
        Route::get('/uploadAlbum', [AlbumController::class, 'create'])->name('uploadAlbum.create');
        Route::post('/uploadAlbum', [AlbumController::class, 'store'])->name('uploadAlbum.store');
        Route::get('/lihat-users', [UserController::class, 'showUsers'])->name('lihatUsers');
        Route::post('/update-user-status/{id}', [UserController::class, 'updateUserStatus'])->name('updateUserStatus');
    });
});
