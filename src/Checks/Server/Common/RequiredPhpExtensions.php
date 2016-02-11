<?php

namespace Arrilot\SystemCheck\Checks\Server\Common;

use Arrilot\SystemCheck\CheckResult;
use Arrilot\SystemCheck\Checks\Check;

class RequiredPhpExtensions extends Check
{
    /**
     * The check description.
     *
     * @var string
     */
    protected $description = 'Required PHP extensions';

    /**
     * Required extensions.
     *
     * @var array
     */
    protected $extensions = [
        'mbstring',
        'openssl',
        'pdo',
        'tokenizer',
    ];

    /**
     * Perform the check.
     *
     * @return CheckResult
     */
    public function perform()
    {
        foreach ($this->extensions as $extension) {
            if (!extension_loaded($extension)) {
                return $this->fail("PHP extension '{$extension}' is missing from your system.");
            }
        }

        return $this->ok();
    }
}
