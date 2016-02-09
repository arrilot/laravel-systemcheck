<?php

namespace Arrilot\SystemCheck\Checks\Server\Production;

use Arrilot\SystemCheck\Checks\BaseCheck;

class XdebugIsNotEnabled extends BaseCheck
{
    /**
     * The check description.
     *
     * @var string
     */
    protected $description = 'Xdebug is not enabled';

    /**
     * Perform the check.
     *
     * @return void
     */
    public function perform()
    {
        if (ini_get('xdebug.profiler_enabled')) {
            $this->fail("Xdebug extension should not be enabled in production");
        }
    }
}