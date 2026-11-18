
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BusinessController;



Route::middleware('guest')->group(function () {

    Route::get('/', function () {
        return redirect()->route('login');
    });

    Route::get('/login', function () {
        return view('login');
    })->name('login');

    Route::post('/login', LoginController::class)
        ->middleware('throttle:5,1')
        ->name('login.attempt');

    Route::get('/register', function () {
        return view('register');
    })->name('register');

    Route::post('/register', [RegisterController::class, 'store'])
        ->name('register.store');
});



Route::middleware('auth')->group(function () {

    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::post('/logout', function () {
        Auth::guard('web')->logout();

        Session::invalidate();
        Session::regenerateToken();

        return redirect()->route('login');
    })->name('logout');

    Route::post('/pet', [PetController::class, 'store'])
        ->name('pet.store');

    Route::post('/profile', [ProfileController::class, 'store'])
        ->name('profile.store');

    Route::post('/business', [BusinessController::class, 'store'])
        ->name('business.store');
});
