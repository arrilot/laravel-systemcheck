<?php

namespace Arrilot\SystemCheck\Checks;

use Arrilot\SystemCheck\Exceptions\FailException;
use Arrilot\SystemCheck\Exceptions\NoteException;

abstract class BaseCheck
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
     * BaseCheck constructor.
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
     * @return void
     */
    abstract public function perform();

    /**
     * Stop the check with an error.
     *
     * @param string $message
     * @throws FailException
     */
    public function fail($message)
    {
        throw new FailException($message);
    }

    /**
     * Stop the check with a note.
     *
     * @param string $message
     * @throws NoteException
     */
    public function note($message)
    {
        throw new NoteException($message);
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