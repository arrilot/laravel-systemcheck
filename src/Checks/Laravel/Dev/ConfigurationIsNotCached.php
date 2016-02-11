<?php

namespace Arrilot\SystemCheck\Checks\Laravel\Dev;

use Arrilot\SystemCheck\Checks\Check;
use Arrilot\SystemCheck\Results\Result;

class ConfigurationIsNotCached extends Check
{
    /**
     * The check description.
     *
     * @var string
     */
    protected $description = 'Configuration cache';

    /**
     * Perform the check.
     *
     * @return Result
     */
    public function perform()
    {
        if ($this->app->configurationIsCached()) {
            return $this->fail('Configuration should not be cached in development');
        }

        return $this->ok();
    }
}
