<?php

namespace Arrilot\SystemCheck\Checks\Server\Production;

use Arrilot\SystemCheck\CheckResult;
use Arrilot\SystemCheck\Checks\Check;

class XdebugIsDisabled extends Check
{
    /**
     * The check description.
     *
     * @var string
     */
    protected $description = 'Xdebug is disabled';

    /**
     * Perform the check.
     *
     * @return CheckResult
     */
    public function perform()
    {
        if (extension_loaded('xdebug')) {
            return $this->fail('Xdebug extension should not be loaded in production');
        }

        return $this->ok();
    }
}
