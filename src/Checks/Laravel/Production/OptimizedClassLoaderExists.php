<?php

namespace Arrilot\SystemCheck\Checks\Laravel\Production;

use Arrilot\SystemCheck\Checks\BaseCheck;

class OptimizedClassLoaderExists extends BaseCheck
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
     * @return void
     */
    public function perform()
    {
        if (! file_exists($this->app->getCachedCompilePath())) {
            $this->fail("Run 'php artisan optimize'");
        }
    }
}