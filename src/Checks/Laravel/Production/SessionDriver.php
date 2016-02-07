<?php

namespace Arrilot\SystemCheck\Checks\Laravel\Production;

use Arrilot\SystemCheck\Checks\BaseCheck;

class SessionDriver extends BaseCheck
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
     * @return void
     */
    public function perform()
    {
        $driver = $this->app['config']['session.driver'];

        if (in_array($driver, ['array', 'file'])) {
            $this->fail("session.driver should not be set to '{$driver}' in production");
        }
    }
}