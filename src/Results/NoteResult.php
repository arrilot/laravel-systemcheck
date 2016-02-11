<?php

namespace Arrilot\SystemCheck\Results;

class NoteResult extends Result
{
    /**
     * Result constructor.
     *
     * @param string $comment
     */
    public function __construct($comment)
    {
        parent::__construct('Note', $comment);
    }
}
