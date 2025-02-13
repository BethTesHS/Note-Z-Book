<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\UserBook;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // The method that retrieves and displays members
    public function viewPage() {
        $userBooks = [];
        $userBooks = UserBook::where('user_id', auth()->user()->id)->with('book')->get();

        // return response()->json([$userBooks[0], $userBooks[0]->book]);
        return view('home', compact('userBooks'));
    }

}
