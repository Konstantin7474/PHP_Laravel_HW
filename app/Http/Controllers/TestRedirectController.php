<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestRedirectController extends Controller
{
    //
    public function __invoke()
    {
        /* return redirect()->action([LibraryUserController::class, 'show'], ['id' => 0]); */

        return redirect()->route('books');
    }
}
