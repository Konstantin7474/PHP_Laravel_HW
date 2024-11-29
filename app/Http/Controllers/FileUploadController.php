<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    //
    public function index()
    {
        return view('upload');
    }

    public function upload(Request $request)
    {
        $number = $request->cookie('number_of_uploads') ?: 0;

        if ($number > 2) {
            return response('Too many uplods' . $number);
        }

        $name = $request->input('file_name');
        $file = $request->file('uploaded_file');

        $tempPath = $file->getRealPath();
        $newFileName = $name . '.' . $file->getClientOriginalExtension();

        $file->move('public/uploads', $newFileName);

        $number++;

        return response($number)->cookie('number_of_uploads', $number);
        /* var_dump($request->header()); */

        /* var_dump($file); */
    }
}
