<?php

namespace Arrilot\SystemCheck\Checks\Server\Common;

use Arrilot\SystemCheck\CheckResult;
use Arrilot\SystemCheck\Checks\Check;

class PhpVersion extends Check
{
    /**
     * The check description.
     *
     * @var string
     */
    protected $description = 'PHP version';

    /**
     * Perform the check.
     *
     * @return CheckResult
     */
    public function perform()
    {
        $minimal = '5.5.9';

        $current = phpversion();

        if (version_compare($current, $minimal, '<')) {
            return $this->fail("Laravel requires PHP >= {$minimal}. Current version: '{$current}'");
        }

        if (version_compare($current, '7.0.0', '<')) {
            return $this->note("PHP7 is highly recommended. Current version: '{$current}'");
        }

        return $this->ok();
    }
}
