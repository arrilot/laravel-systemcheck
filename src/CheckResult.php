<?php

namespace Arrilot\SystemCheck;

use InvalidArgumentException;

class CheckResult
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
     * Possible check statuses.
     *
     * @var array
     */
    protected $possibleStatuses = [
        'Ok',
        'Note',
        'Fail',
        'Skip',
    ];

    /**
     * Result constructor.
     *
     * @param string $status
     * @param string $comment
     */
    public function __construct($status, $comment)
    {
        if (! in_array($status, $this->possibleStatuses)) {
            throw new InvalidArgumentException("Check result can not have status '{$status}'");
        }

        $this->status = $status;
        $this->comment = $comment;
    }
}
