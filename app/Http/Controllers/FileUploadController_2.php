<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController_2 extends Controller
{
    //
    public function showForm()
    {
        return view('upload-form');
    }

    public function fileUpload(Request $request)
    {
        /* if ($request->hasFile('upload-photo')) {
            $file = $request->file('upload-photo');
            echo $file->path();
            echo '<br>';
            echo $file->getClientOriginalName();
            echo '<br>';
            echo $file->getClientOriginalExtension();
            $file->storeAs('images', $file->getClientOriginalName());
        } else {
            echo 'No file upload';
        } */

        foreach ($request->upload_photo as $photo) {
            var_dump($photo);
        }
    }
}
