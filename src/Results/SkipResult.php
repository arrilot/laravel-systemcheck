<?php

namespace Arrilot\SystemCheck\Results;

class SkipResult extends Result
{
    /**
     * Result constructor.
     *
     * @param string $comment
     */
    public function __construct($comment)
    {
        parent::__construct('Skip', $comment);
    }
}
