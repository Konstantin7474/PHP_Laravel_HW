<?php

namespace App\Console;

use App\Jobs\ClearCache;
use App\Jobs\SyncNews;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{

    /**
     * Define the application's command schedule.
     * 
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        /* $schedule->command('inspire')->hourly(); */
        /* $schedule->call(function () {
            Log::info('Collback executed');
        })->everyMinute();
        $schedule->command('app:dump-database')->everyMinute();
        $schedule->job(SyncNews::class)->everyMinute(); */
        $schedule->job(ClearCache::class)->hourly();
    }

    /**
     * Register the commands for the application.
     * 
     * @return void
     */

    protected function commands()
    {
        /* $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php'); */
    }
}
