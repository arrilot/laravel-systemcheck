<?php

namespace Arrilot\SystemCheck\Checks\Laravel\Dev;

use Arrilot\SystemCheck\Checks\Check;
use Arrilot\SystemCheck\CheckResult;

class RoutesAreNotCached extends Check
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
     * @return CheckResult
     */
    public function perform()
    {
        if ($this->app->routesAreCached()) {
            return $this->fail('Routes should not be cached in development');
        }

        return $this->ok();
    }
}
