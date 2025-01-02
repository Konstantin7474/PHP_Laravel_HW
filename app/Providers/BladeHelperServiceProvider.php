<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class BladeHelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        Blade::directive('headerUpperCase', function ($text){
            return "<?php echo '<h1>' . strtoupper($text) . '</h1>'; ?>";
        });
    }
}
