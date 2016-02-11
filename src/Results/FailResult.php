<?php

namespace Arrilot\SystemCheck\Results;

class FailResult extends Result
{
    /**
     * Result constructor.
     *
     * @param string $comment
     */
    public function __construct($comment)
    {
        parent::__construct('Fail', $comment);
    }
}
