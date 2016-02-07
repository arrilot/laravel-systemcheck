<?php

namespace Arrilot\SystemCheck\Checks\Server\Common;

use Arrilot\SystemCheck\Checks\BaseCheck;

class PhpVersion extends BaseCheck
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
     * @return void
     */
    public function perform()
    {
        $minimal = '5.5.9';
        $current = phpversion();

        if (version_compare($current, $minimal, '<')) {
            $this->fail("Laravel requires PHP >= {$minimal}. Current version: '{$current}'");
        }
    }
}