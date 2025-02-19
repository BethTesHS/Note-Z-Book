<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\UserBook;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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

    public function addBook(Request $request) {
        try{
            $validated = $request->validate([
                'title' => 'required|string',
                'author' => 'required|string',
                'publisher' => 'required|string',
                'synopsis' => 'required|string',
                'publishedDate' => 'required|date',
                'pages' => 'required|integer',
            ]);

            $book = new Book();

            $book->title = $validated['title'];
            $book->author = $validated['author'];
            $book->publisher = $validated['publisher'];
            $book->synopsis = $validated['synopsis'];
            $book->publishedDate = $validated['publishedDate'];
            $book->pages = $validated['pages'];

            $book->save();

            UserBook::insert([
                'user_id' => auth()->user()->id,
                'book_id' => $book->id,
                'pagesRead' => 0,
                'readingStatus' => 'Currently Reading',
                'created_at' => now(), 
                'updated_at' => now()
            ]);



            return redirect()->route('books')->with('success', 'Product added successfully!');
        } catch (ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator) // Store validation errors
                ->with('error_alert', true); // Store session flag for alert
        }
    }

}
