<?php

namespace Arrilot\SystemCheck\Checks\Laravel\Production;

use Arrilot\SystemCheck\Checks\Check;
use Arrilot\SystemCheck\CheckResult;

class CacheDriver extends Check
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
     * @return CheckResult
     */
    public function perform()
    {
        $driver = $this->app['config']['cache.default'];

        if ($driver === 'array') {
            return $this->fail("Default cache driver must not be set to 'array' in production");
        }

        if ($driver === 'file') {
            return $this->note('File cache driver is not recommended for production');
        }

        return $this->ok();
    }
}
