<?php

namespace App\Providers;

use App\Services\SmsSenderInterface;
use App\Services\SmsSenderService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(SmsSenderInterface::class, function () {
            return new SmsSenderService('7090809890', 'lksdjflkjlk');
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
