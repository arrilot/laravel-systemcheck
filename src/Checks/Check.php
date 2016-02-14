<?php

namespace Arrilot\SystemCheck\Checks;

use Arrilot\SystemCheck\CheckResult;

abstract class Check
{
    /**
     * The check description.
     *
     * @var string
     */
    protected $description;

    /**
     * The Laravel application instance.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $app;

    /**
     * Check constructor.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * Perform the check.
     *
     * @return CheckResult
     */
    abstract public function perform();

    /**
     * Stop the check because it passed.
     *
     * @param string $message
     *
     * @return CheckResult
     */
    public function ok($message = '')
    {
        return new CheckResult('Ok', $message);
    }

    /**
     * Stop the check with a note.
     *
     * @param string $message
     *
     * @return CheckResult
     */
    public function note($message = '')
    {
        return new CheckResult('Note', $message);
    }

    /**
     * Stop the check with an error.
     *
     * @param string $message
     *
     * @return CheckResult
     */
    public function fail($message = '')
    {
        return new CheckResult('Fail', $message);
    }

    /**
     * Skip the check.
     *
     * @param string $message
     *
     * @return CheckResult
     */
    public function skip($message = '')
    {
        return new CheckResult('Skip', $message);
    }

    /**
     * Getter for description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
