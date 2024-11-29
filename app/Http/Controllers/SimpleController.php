<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;

class SimpleController extends Controller
{
    //
    public function test(Request $request)
    {
        $response = [ 'param1' => $request->param, 'param2' => $request->param2];
        
        /* return new Response(json_encode($response)); */

        return response()->json($response);
    }
}
