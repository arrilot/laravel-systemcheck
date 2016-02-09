<?php

namespace Arrilot\SystemCheck\Checks\Server\Dev;

use Arrilot\SystemCheck\Checks\BaseCheck;

class FunctionNestingLevel extends BaseCheck
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
     * @return void
     */
    public function perform()
    {
        if (ini_get('xdebug.max_nesting_level') && ini_get('xdebug.max_nesting_level') < 256) {
            $this->fail("xdebug.max_nesting_level should be >= 256");
        }
    }
}