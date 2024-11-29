<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    /* public function showUsers()
    {
        $users = DB::connection('mysql')->table('user')->select(['first_name', 'last_name', 'email'])->get();
        print_r($users);
    } */
    /* public function __invoke()
    {
        // $users = DB::connection('mysql')->table('user')->select(['first_name', 'email'])->get();

        DB::connection('mysql')->table('user')->insert(['first_name' => 'Nikolai', 'last_name' => 'Nikolaev', 'email' => 'nikolaev@gmail.com']);
        DB::connection('mysql')->table('user')->insert(['first_name' => 'Nikolai', 'last_name' => 'Nikolaev', 'email' => 'nikolaev@gmail.com']);
        DB::connection('mysql')->table('user')->insert(['first_name' => 'Nikolai', 'last_name' => 'Nikolaev', 'email' => 'nikolaev@gmail.com']);
        DB::connection('mysql')->table('user')->insert(['first_name' => 'Nikolai', 'last_name' => 'Nikolaev', 'email' => 'nikolaev@gmail.com']);

        $users = DB::connection('mysql')->table('user')->select(['first_name', 'email'])->get();

        //foreach ($users as $user){
        //    echo $user->first_name . '<br>';
        //}
        return view('user', ['users' => $users]);
    } */

    public function index()
    {
        return view('test');
    }

    public function store(Request $request)
    {
        $userData = ['User name' => $request->username, 'email' => $request->email];

        return response()->json($userData);
    }
}
