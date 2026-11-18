<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BusinessController;


Route::get('/',function(){
    return view('login');
})-> name('login');

Route::post('login', LoginController::class)
->middleware('throttle:5,1')
->name('login.attempt');

Route::view('dashboard', 'dashboard')
->middleware('auth')
->name('dashboard');

Route::post('logout',function(){
    Auth::guard('web')->logout();

    Session::invalidate();
    Session::regenerateToken();

    return redirect('/');

})->name('logout');

Route::view('register','register')->name('register');

Route::post('register', RegisterController::class)->name('register.store');

Route::view('login','login')->name('login');

Route::post('pet', [PetController::class, 'store'])
    ->middleware('auth')
    ->name('pet.store');

Route::post('profile', [ProfileController::class, 'store'])
    ->middleware('auth')
    ->name('profile.store');

Route::post('business', [BusinessController::class, 'store'])
    ->middleware('auth')
    ->name('business.store');

