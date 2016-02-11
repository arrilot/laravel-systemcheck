<?php

namespace Arrilot\SystemCheck\Checks\Server\Dev;

use Arrilot\SystemCheck\CheckResult;
use Arrilot\SystemCheck\Checks\Check;

class FunctionNestingLevel extends Check
{
    /**
     * The check description.
     *
     * @var string
     */
    protected $description = 'Maximum function nesting level';

    /**
     * Perform the check.
     *
     * @return CheckResult
     */
    public function perform()
    {
        if (! extension_loaded('xdebug')) {
            $this->skip();
        }

        if (ini_get('xdebug.max_nesting_level') < 256) {
            return $this->fail("xdebug.max_nesting_level should be >= 256");
        }

        return $this->ok();
    }
}