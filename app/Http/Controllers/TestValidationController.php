<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class TestValidationController extends Controller
{
    //
    public function show()
    {
        return view('employee_validation');
    }

    public function post(Request $request)
    {
        /* try {
            $validated = $request->validate([
                'fullname' => ['required']
            ]);
        } catch (ValidationException $e) {
            die($e->getMessage());
        } */

        $validated = $request->validate([
            'fullname' => ['required'],
            'password' => ['min:5']
        ]);

        var_dump($validated);
    }
}
