<?php

namespace App\Http\Controllers;

use App\Services\CustomLogDbService;
use App\Services\CustomLogServiceInterface;
use App\Services\SmsSenderInterface;
use Illuminate\Http\Request;

class TestDiController extends Controller
{
    //
    public function showUrl(Request $request, CustomLogServiceInterface $customLog)
    {
        echo $request->getUri();
        $customLog->rotateLogs();
    }

    public function sendSms(SmsSenderInterface $sender)
    {
        $sender->send('Hello world');
    }
}
