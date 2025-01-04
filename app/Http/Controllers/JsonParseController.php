<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JsonParseController extends Controller
{
    //
    public function parseJson(Request $request)
    {
        /* var_dump(json_decode($request->getContent())); */
        echo $request->json()->get('first_name');
    }
}
