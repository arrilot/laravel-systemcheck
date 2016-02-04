<?php

namespace Arrilot\SystemCheck\Checks\Server\Common;

use Arrilot\SystemCheck\Checks\BaseCheck;

class PhpVersionCheck extends BaseCheck
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
            $this->error("Laravel requires PHP >= {$minimal}. Current version: '{$current}'");
        }
    }
}