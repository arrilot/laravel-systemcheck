<?php

namespace Arrilot\SystemCheck\Checks\Laravel\Dev;

use Arrilot\SystemCheck\Checks\BaseCheck;

class ConfigurationIsNotCached extends BaseCheck
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
     * @return void
     */
    public function perform()
    {
        if ($this->app->configurationIsCached()) {
            $this->fail('Configuration should not be cached in development');
        }
    }
}