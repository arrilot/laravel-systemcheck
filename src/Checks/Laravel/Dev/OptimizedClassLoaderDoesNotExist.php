<?php

namespace Arrilot\SystemCheck\Checks\Laravel\Dev;

use Arrilot\SystemCheck\CheckResult;
use Arrilot\SystemCheck\Checks\Check;

class OptimizedClassLoaderDoesNotExist extends Check
{
    /**
     * The check description.
     *
     * @var string
     */
    protected $description = 'Optimized class loader does not exist';

    /**
     * Perform the check.
     *
     * @return CheckResult
     */
    public function perform()
    {
        if (
            file_exists($this->app->getCachedPackagesPath()) ||
            file_exists($this->app->getCachedServicesPath())
        ) {
            return $this->fail("Run 'php artisan clear-compiled'");
        }

        return $this->ok();
    }
}
