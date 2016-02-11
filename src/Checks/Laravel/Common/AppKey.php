<?php

namespace Arrilot\SystemCheck\Checks\Laravel\Common;

use Arrilot\SystemCheck\Checks\Check;
use Arrilot\SystemCheck\Results\Result;

class AppKey extends Check
{
    /**
     * The check description.
     *
     * @var string
     */
    protected $description = 'app.key';

    /**
     * Perform the check.
     *
     * @return Result
     */
    public function perform()
    {
        $key = $this->app['config']['app.key'];

        if (!$key) {
            return $this->fail('app.key must be set');
        }

        if (strlen($key) !== 32) {
            return $this->fail('app.key must be a 32 character string');
        }

        return $this->ok();
    }
}
