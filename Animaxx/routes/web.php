<?php

use App\Http\Controllers\loginRegisterControler;
use App\Http\Controllers\ProfileControler;
use Illuminate\Support\Facades\Route;

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

// ===================================================== buat login register
Route::get('/', function () {
    return view('loginRegisterPage/login');
});

Route::get('/register', function () {
    return view('loginRegisterPage/register');
});

Route::post('/',[loginRegisterControler::class,'login']);
Route::post('/register',[loginRegisterControler::class,'register']);

// ===================================================== buat main menu user dan admin
Route::get('/main/home', function () {
    return view('mainMenu/mainMenuHome');
});

Route::get('/main/profile/admin',function(){
    return view('profile/adminProfile');
});

Route::get('/main/profile/user',function(){
    return view('profile/userProfile');
});

Route::post('/main/profile/ubah',[ProfileControler::class,'editProfil']);

// ==================================================== buat album
Route::get('/album',function(){
    return view('album/album');
});

Route::get('/album/watch',function(){
    return view('watch/watch');
});


