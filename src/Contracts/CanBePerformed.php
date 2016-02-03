<?php

namespace Arrilot\SystemCheck\Contracts;

interface CanBePerformed
{
    /**
     * A name to display.
     *
     * @return string
     */
    public function getName();

    /**
     * A code to identify check.
     *
     * @return string
     */
    public function getCode();

    /**
     * A place where check is performed.
     *
     *
     * @return void
     */
    public function perform();
}