<?php

namespace App\Services;

interface SmsSenderInterface
{
    public function send($message);
}
