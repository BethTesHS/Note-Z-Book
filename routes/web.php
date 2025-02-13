<?php

use Illuminate\Support\Facades\Route;



use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;

use App\Http\Controllers\PdfController;

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::post('logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);


Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('home');
    });

    Route::get('home', [HomeController::class, 'viewPage'])->name('home'); // Form page

    Route::get('books', [BookController::class, 'viewPage'])->name('books'); // Form page
    
    Route::get('viewBook', [BookController::class, 'viewBook'])->name('viewBook'); // Form page
    Route::get('showBook', [BookController::class, 'showBook'])->name('showBook'); // Form page


    Route::get('chatGPT1', function () { return view('unused.chatGPT1'); })->name('chatGPT1');
    Route::get('chatGPT2', function () { return view('unused.chatGPT2'); })->name('chatGPT2');
    Route::get('copilot1', function () { return view('unused.copilot1'); })->name('copilot1');


});

Route::get('swipe', function () {
    return view('unused.swipe');
});

Route::get('openBook', function () {
    return view('unused.openBook');
});

Route::get('closedBook', function () {
    return view('unused.closedBook');
});

Route::get('closed3Dbook', function () {
    return view('unused.closed3Dbook');
});

Route::get('closed3Dbook2', function () {
    return view('unused.closed3Dbook2');
});
Route::get('/upload', [PdfController::class, 'unused.showUploadForm'])->name('pdf.upload.form');
Route::post('/upload', [PdfController::class, 'unused.upload'])->name('pdf.upload');
Route::get('/pdf/{filename}', [PdfController::class, 'unused.view'])->name('pdf.view');
Route::get('pdfs', [PdfController::class, 'unused.list'])->name('pdf.list');
