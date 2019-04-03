<?php

namespace Arrilot\SystemCheck;

use Arrilot\SystemCheck\Console\SystemCheckCommand;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function boot() {}
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ChecksCollection::class, function ($app) {
            return new ChecksCollection($app);
        });

        $this->app->singleton('command.system.check', function ($app) {
            return new SystemCheckCommand($app->make(ChecksCollection::class));
        });

        $this->commands('command.system.check');
    }
}
