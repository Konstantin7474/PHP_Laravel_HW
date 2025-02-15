<?php

namespace App\Listeners;
use App\Events\NewsHidden;
use Illuminate\Support\Facades\Log;

class NewsHiddenListener
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
    public function handle(NewsHidden $event): void
    {
        //
        Log::info('News' . $event->news2->id . 'hidden');
    }
}
