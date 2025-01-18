<?php

namespace App\Http\Controllers;

use App\Models\User_2;
use Illuminate\Http\Request;

class User2Controller extends Controller
{
    //
    public function index()
    {
        return view('user_2_2');
        return User_2::all();
    }

    public function get(Request $request, $id)
    {
        $user = User_2::where('id', $id)->first();
        return $user;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
        ]);
        return User_2::create($request->all());
    }
}
