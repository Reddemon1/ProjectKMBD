<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

// Route::view('/', 'dashboard')->name('dashboard');
Route::get('/', function () {
    return view('Home', ['title'=>'Home Page']);
})->name("home");

Route::get('/Login', function () {
    return view('auth.Login', ['title'=>'Login Page']);
});
Route::get('/Register', function () {
    return view('auth.Register', ['title'=>'Register Page']);
});


Route::post('/RequestLogin', [UserController::class,'login'])->name('RequestLogin');
Route::post('/RequestRegister', [UserController::class,'register'])->name('RequestRegister');
Route::get('/logout', [UserController::class,'logout'])->name('logout');


Route::get('/AboutUs', function () {
    return view('AboutUs',['title'=>'About Us']);
});

Route::get('/Production', function () {
    return view('Production',['title'=>'Production']);
});

Route::get('/Events', function () {
    return view('Events',['title'=>'Events']);
})->middleware(RoleMiddleware::class.':admin');

Route::get('/Partner', function () {
    return view('Partner',['title'=>'Partner']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/Control-Panel', function () {
    return view("Admin");
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
