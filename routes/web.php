<?php

use Illuminate\Support\Facades\Route;



use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::post('logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);


Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('home', [HomeController::class, 'page'])->name('home'); // Form page
    Route::post('home', [HomeController::class, 'store'])->name('home.store'); // Store data after form submission
    Route::put('home', [HomeController::class, 'update'])->name('home.update'); // Store data after form submission
    Route::delete('home', [HomeController::class, 'delete'])->name('home.delete'); // Store data after form submission


    Route::get('chatGPT1', function () { return view('unused.chatGPT1'); })->name('chatGPT1');
    Route::get('chatGPT2', function () { return view('unused.chatGPT2'); })->name('chatGPT2');
    Route::get('copilot1', function () { return view('unused.copilot1'); })->name('copilot1');


});