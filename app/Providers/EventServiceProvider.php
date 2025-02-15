<?php

namespace App\Providers;

use App\Events\NewsCreated;
use App\Events\NewsHidden;
use App\Listeners\NewsHiddenListener;
use App\Listeners\SendNewsCreatedNotification;
use App\Listeners\SendNewsToRemoteServer;
use App\Observers\NewsObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Support\ServiceProvider;
use App\Models\News;
use App\Models\News2;
use App\Observers\NewsObserver2;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    /* public function register(): void
    {
    
    } */
   protected $listen = [
    Registered::class => [
        SendEmailVerificationNotification::class,
    ],
    NewsCreated::class => [
        SendNewsCreatedNotification::class,
        SendNewsToRemoteServer::class,
    ],
    NewsHidden::class => [
        NewsHiddenListener::class
    ]
    ];

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        News::observe(NewsObserver::class);
        News2::observe(NewsObserver2::class);
    }
}
