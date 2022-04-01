<?php

namespace App\Providers;

use App\Example;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\ServiceProvider;

class ExampleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('example', function () {
            $file=app(Filesystem::class);
            return new Example($file);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
