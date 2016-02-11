<?php

namespace Arrilot\SystemCheck\Results;

class OkResult extends Result
{
    /**
     * Result constructor.
     *
     * @param string $comment
     */
    public function __construct($comment)
    {
        parent::__construct('Ok', $comment);
    }
}
