<?php

use App\Http\Requests\LoginUser;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', function () {
    if(!Auth::user()){
    return view('login');
    }else{
    return redirect('dashboard');
    }
})->name('login');

Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

Route::post('login', function () {
    $credentials= Request()->only('email','password');

    if(Auth::attempt($credentials)){
        Request()->session()->regenerate();
        return redirect('dashboard');
    }else{
        return redirect('login');
    }
})->name('login.post');

Route::get('logout',function(){
    Auth::logout();
    return redirect('login');
})->name('logout');
