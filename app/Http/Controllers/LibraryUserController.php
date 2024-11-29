<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibraryUserController extends Controller
{
    //
    protected $users = [
        ['id' => 0, 'user_name' => 'user1', 'first_name' => 'vasily', 'last_name' => 'pupkin', 'list_of_books' => ['Book1', 'Book3', 'Book4']],
        ['id' => 1, 'user_name' => 'user2', 'first_name' => 'vitaliy', 'last_name' => 'ivanov', 'list_of_books' => ['Book5', 'Book6', 'Book7']]
    ];


    public function show($id)
    {
        return view('user', ['user' => $this->users[$id]]);
    }
}
