<?php

namespace Arrilot\SystemCheck\Results;

abstract class Result
{
    /**
     * Status message.
     *
     * @var string
     */
    public $status;

    /**
     * Result comment.
     *
     * @var string
     */
    public $comment;

    /**
     * Result constructor.
     *
     * @param string $status
     * @param string $comment
     */
    public function __construct($status, $comment)
    {
        $this->status = $status;
        $this->comment = $comment;
    }
}
