<?php

namespace Arrilot\SystemCheck\Checks\Server\Common;

use Arrilot\SystemCheck\Checks\BaseCheck;

class RequiredPhpExtensions extends BaseCheck
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
     * @return void
     */
    public function perform()
    {
        foreach ($this->extensions as $extension) {
            if (! extension_loaded($extension)) {
                $this->fail("PHP extension '{$extension}' is missing from your system.");
            }
        }
    }
}