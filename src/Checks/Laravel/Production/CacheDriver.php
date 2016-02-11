<?php

namespace Arrilot\SystemCheck\Checks\Laravel\Production;

use Arrilot\SystemCheck\Checks\BaseCheck;

class CacheDriver extends BaseCheck
{
    /**
     * The check description.
     *
     * @var string
     */
    protected $description = 'cache.default';

    /**
     * Perform the check.
     *
     * @return void
     */
    public function perform()
    {
        $driver = $this->app['config']['cache.default'];

        if ($driver === 'array') {
            $this->fail("Default cache driver must not be set to 'array' in production");
        }

        if ($driver === 'file') {
            $this->note('File cache driver is not recommended for production');
        }
    }
}