<?php

namespace Arrilot\SystemCheck\Checks\Laravel\Production;

use Arrilot\SystemCheck\Results\Result;
use Arrilot\SystemCheck\Checks\Check;

class SessionDriver extends Check
{
    /**
     * The check description.
     *
     * @var string
     */
    protected $description = 'session.driver';

    /**
     * Perform the check.
     *
     * @return Result
     */
    public function perform()
    {
        $driver = $this->app['config']['session.driver'];

        if ($driver === 'array') {
            return $this->fail("session.driver must not be set to 'array' in production");
        }

        if ($driver === 'file') {
            return $this->note('File session driver is not recommended for production');
        }

        return $this->ok();
    }
}