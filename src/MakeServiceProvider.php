<?php

namespace Laracademy\Commands;

/*
 *
 * @author Michael McMullen <packages@laracademy.co>
 */

use Illuminate\Support\ServiceProvider;

class MakeServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    public function boot()
    {
        //
    }

    public function register()
    {
        $this->registerModelGenerator();
    }

    private function registerModelGenerator()
    {
        $this->app->singleton('command.laracademy.make', function ($app) {
            return $app['Laracademy\Commands\Commands\MakeCommand'];
        });

        $this->commands('command.laracademy.make');
    }
}