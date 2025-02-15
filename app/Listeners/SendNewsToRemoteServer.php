<?php

namespace App\Listeners;

use App\Events\NewsCreated;
use Illuminate\Support\Facades\Log;

class SendNewsToRemoteServer
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NewsCreated $event): void
    {
        //
        Log::info('Send News To Remote server listener fired id ' . $event->news->id);
    }
}
