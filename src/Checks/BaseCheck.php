<?php

namespace Arrilot\SystemCheck\Checks;

use Arrilot\SystemCheck\Exceptions\CheckFailedException;
use Arrilot\SystemCheck\Exceptions\CheckSkippedException;

abstract class BaseCheck
{
    /**
     * The check description.
     *
     * @var string
     */
    protected $description;

    /**
     * Perform the check.
     *
     * @return void
     */
    abstract public function perform();

    /**
     * Stop the check with error.
     *
     * @param string $message
     * @throws CheckFailedException
     */
    public function error($message = 'An error occurred during check.')
    {
        throw new CheckFailedException($message);
    }

    /**
     * Skip the check.
     *
     * @param string $message
     * @throws CheckSkippedException
     */
    public function skip($message = '')
    {
        throw new CheckSkippedException($message);
    }
}