<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\UserBook;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // The method that retrieves and displays members
    public function viewPage() {
        $userBooks = [];
        $userBooks = UserBook::where('user_id', auth()->user()->id)->with('book')->get();

        return view('books', compact('userBooks'));
    }

    public function showBook(Request $request) {
        $book = json_decode($request->input('book'));
        $userBook =json_decode($request->input('userBook'));
        // $readProgress = $request->input('readProgress');

        session([
            'book'=> $book,
            'userBook'=> $userBook,
        ]);
        
        return redirect()->route('viewBook');
    }

    public function viewBook() {
        $book = session('book');
        $userBook = session('userBook');
        // $readProgress = session('readProgress');

        return view('book', compact('book', 'userBook'));
    }

}
