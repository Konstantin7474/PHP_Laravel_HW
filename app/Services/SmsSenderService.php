<?php

namespace App\Services;

use Twilio\Rest\Client as TwilioClient;

class SmsSenderService implements SmsSenderInterface
{
    protected $client;

    public function __constructor($sid, $token)
    {
        $this->client = new TwilioClient($sid, $token);
    }

    public function send($message)
    {
        $this->client->message->create(
            779997839273,
            [
                'from' => 328979832947,
                'body' => 'sdjkhfjkdhkjf'
            ]
        );
    }
}
