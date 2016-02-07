<?php

namespace Arrilot\SystemCheck\Checks\Laravel\Production;

use Arrilot\SystemCheck\Checks\BaseCheck;

class ConfigurationIsCached extends BaseCheck
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
        if (! $this->app->configurationIsCached()) {
            $this->fail('Configuration should be cached in production');
        }
    }
}