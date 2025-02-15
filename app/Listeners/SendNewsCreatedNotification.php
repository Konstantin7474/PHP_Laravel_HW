<?php

namespace App\Listeners;

use App\Events\NewsCreated;
use Illuminate\Support\Facades\Log;

class SendNewsCreatedNotification
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
    public function handle(NewsCreated $event): false
    {
        //
        Log::info('Send News created notification listener fired id ' . $event->news->id);
        return false;
    }
}
