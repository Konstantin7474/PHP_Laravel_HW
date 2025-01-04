<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestCookieController extends Controller
{
    //
    public function TestCookie(Request $request)
    {
        $sessionIdentify = $request->cookie('laravel_session');
        $session = $request->session();
        echo $sessionIdentify . ' ';
        echo $session->get('_token');
    }
}
