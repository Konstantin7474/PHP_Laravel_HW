<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestSecurityController extends Controller
{
    //
    public function show()
    {
        return view('test_csrf');
    }

    public function post(Request $request)
    {
        echo $request->input('test_name');
    }
}
