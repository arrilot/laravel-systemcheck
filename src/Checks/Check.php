<?php

namespace Arrilot\SystemCheck\Checks;

use Arrilot\SystemCheck\Results\FailResult;
use Arrilot\SystemCheck\Results\NoteResult;
use Arrilot\SystemCheck\Results\OkResult;
use Arrilot\SystemCheck\Results\Result;
use Arrilot\SystemCheck\Results\SkipResult;

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
     * @return Result
     */
    abstract public function perform();

    /**
     * Stop the check because it passed.
     *
     * @param string $message
     * @return Result
     */
    public function ok($message = '')
    {
        return new OkResult($message);
    }

    /**
     * Stop the check with a note.
     *
     * @param string $message
     * @return Result
     */
    public function note($message = '')
    {
        return new NoteResult($message);
    }

    /**
     * Stop the check with an error.
     *
     * @param string $message
     * @return Result
     */
    public function fail($message = '')
    {
        return new FailResult($message);
    }

    /**
     * Skip the check.
     *
     * @param string $message
     * @return Result
     */
    public function skip($message = '')
    {
        return new SkipResult($message);
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