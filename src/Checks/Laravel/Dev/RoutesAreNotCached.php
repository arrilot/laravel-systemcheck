<?php

namespace Arrilot\SystemCheck\Checks\Laravel\Dev;

use Arrilot\SystemCheck\Checks\BaseCheck;

class RoutesAreNotCached extends BaseCheck
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
        if ($this->app->routesAreCached()) {
            $this->fail('Routes should not be cached in development');
        }
    }
}