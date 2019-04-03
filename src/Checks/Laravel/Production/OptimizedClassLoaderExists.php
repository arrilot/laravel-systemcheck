<?php

namespace Arrilot\SystemCheck\Checks\Laravel\Production;

use Arrilot\SystemCheck\CheckResult;
use Arrilot\SystemCheck\Checks\Check;

class OptimizedClassLoaderExists extends Check
{
    /**
     * The check description.
     *
     * @var string
     */
    protected $description = 'Optimized class loader';

    /**
     * Perform the check.
     *
     * @return CheckResult
     */
    public function perform()
    {
        if (
            !   file_exists($this->app->getCachedConfigPath()) ||
            !   file_exists($this->app->getCachedPackagesPath()) ||
            !   file_exists($this->app->getCachedRoutesPath()) ||
            !   file_exists($this->app->getCachedServicesPath())
        ) {
            return $this->fail("Run 'php artisan optimize'");
        }

        return $this->ok();
    }
}
