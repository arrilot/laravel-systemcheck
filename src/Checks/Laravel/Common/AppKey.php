<?php

namespace Arrilot\SystemCheck\Checks\Laravel\Common;

use Arrilot\SystemCheck\Checks\BaseCheck;

class AppKey extends BaseCheck
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
     * @return void
     */
    public function perform()
    {
        $key = $this->app['config']['app.key'];

        if (! $key) {
            $this->fail("app.key must be set");
        }

        if (strlen($key) !== 32) {
            $this->fail("app.key must be a 32 character string");
        }
    }
}