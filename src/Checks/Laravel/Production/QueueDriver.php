<?php

namespace Arrilot\SystemCheck\Checks\Laravel\Production;

use Arrilot\SystemCheck\CheckResult;
use Arrilot\SystemCheck\Checks\Check;

class QueueDriver extends Check
{
    /**
     * The check description.
     *
     * @var string
     */
    protected $description = 'queue.default';

    /**
     * Perform the check.
     *
     * @return CheckResult
     */
    public function perform()
    {
        $driver = $this->app['config']['queue.default'];

        if ($driver === 'null') {
            return $this->fail("Default queue driver must not be set to 'null' in production");
        }

        if ($driver === 'sync') {
            return $this->note('Sync queue driver is not recommended for production');
        }

        return $this->ok();
    }
}
