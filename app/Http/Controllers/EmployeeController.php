<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //
    public function index()
    {
        return view('worker_form');
    }

    public function store(Request $request)
    {
        $name = $request->input('name');
        $lastname = $request->input('lastname');
        $position = $request->input('position');
        $address = $request->input('address');
        $email = $request->input('email');
        $workData = $request->input('workData');

        $jsonData = $request->input('json_data');
        $decodedData = json_decode($jsonData, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return response()->json(['error' => 'Invalid JSON format'], 400);
        }

        $street = $decodedData['address']['street'] ?? null;
        $city = $decodedData['address']['city'] ?? null;
        $latitude = $decodedData['address']['geo']['lat'] ?? null;
        $longitude = $decodedData['address']['geo']['lng'] ?? null;


        return response()->json([
            'message' => 'Data stored successfully',
            'json_data' => $decodedData,
        ]);

        $path = $this->getPath($request);
        $url = $this->getUrl($request);
    }

    public function update(Request $request, $id)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $position = $request->input('position');
        $address = $request->input('address');

        $jsonData = $request->input('json_data');
        $decodedData = json_decode($jsonData, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return response()->json(['error' => 'Invalid JSON format'], 400);
        }

        $street = $decodedData['address']['street'] ?? null;
        $city = $decodedData['address']['city'] ?? null;
        $latitude = $decodedData['address']['geo']['lat'] ?? null;
        $longitude = $decodedData['address']['geo']['lng'] ?? null;


        return response()->json([
            'message' => 'User updated successfully',
            'json_data' => $decodedData,
        ]);

        $path = $this->getPath($request);
        $url = $this->getUrl($request);

        return response()->json([
            'message' => 'User updated successfully',
            'path' => $path,
            'url' => $url,
        ]);
    }


    private function getPath(Request $request)
    {
        return $request->path();
    }

    private function getUrl(Request $request)
    {
        return $request->url();
    }
}
