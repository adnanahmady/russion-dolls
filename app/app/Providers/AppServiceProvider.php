<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('cache', function ($expression) {
            return "<?php if (! App\Custom\Caching\RussianDolls::setUp($expression)) { ?>";
        });

        Blade::directive('endcache', function() {
            return "<?php } echo App\Custom\Caching\RussianDolls::tearDown() ?>";
        });
    }
}
