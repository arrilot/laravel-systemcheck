<?php

namespace Arrilot\SystemCheck\Checks\Laravel\Dev;

use Arrilot\SystemCheck\Checks\BaseCheck;

class OptimizedClassLoaderDoesNotExist extends BaseCheck
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
     * @return void
     */
    public function perform()
    {
        if (file_exists($this->app->getCachedCompilePath())) {
            $this->fail("Run 'php artisan clear-compiled'");
        }
    }
}