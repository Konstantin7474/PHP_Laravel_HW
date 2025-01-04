<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestTestController extends Controller
{
    //
    public function  testRequest(Request $request)
    {
        /* $firstName = $request->input('first_name', 'No name');
        $lastName = $request->input('last_name', 'No name');

        echo $firstName . ' ' . $lastName; */

        /* $firstName = $request->all();

        print_r($firstName); */

        /* $requestParameters = $request->all();

        echo $requestParameters['first_name']; */

        $requestParameters = $request->collect();

        $requestParameters->each(function ($field) {
            echo $field . ' ';
        });
    }
}
