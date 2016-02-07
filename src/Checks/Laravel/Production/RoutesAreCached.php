<?php

namespace Arrilot\SystemCheck\Checks\Laravel\Production;

use Arrilot\SystemCheck\Checks\BaseCheck;

class RoutesAreCached extends BaseCheck
{
    /**
     * The check description.
     *
     * @var string
     */
    protected $description = 'Route cache';

    /**
     * Perform the check.
     *
     * @return void
     */
    public function perform()
    {
        if (! $this->app->routesAreCached()) {
            $this->fail('Routes should be cached in production');
        }
    }
}