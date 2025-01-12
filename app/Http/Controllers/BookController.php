<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function show()
    {
        return view('form_3');
    }

    public function store(Request $request) 
    {


        $book = $request->validate([
            'title' => ['required', 'max:255'],
            'author' => ['required', 'max:100'],
        ]);

        var_dump($book);

        $book = new Book($request->all());
        $book->genre = serialize($request->input('genre'));

        $book->save();
    }
}
