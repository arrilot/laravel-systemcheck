<?php

namespace Arrilot\SystemCheck\Checks\Laravel\Common;

use Arrilot\SystemCheck\CheckResult;
use Arrilot\SystemCheck\Checks\Check;

class AppKey extends Check
{
    protected $keyLength = 51;
    /**
     * The check description.
     *
     * @var string
     */
    protected $description = 'app.key';

    /**
     * Perform the check.
     *
     * @return CheckResult
     */
    public function perform()
    {
        $key = $this->app['config']['app.key'];

        if (!$key) {
            return $this->fail('app.key must be set');
        }

        if (strlen($key) !== $this->keyLength) {
            return $this->fail("app.key must be a {$this->keyLength} character string");
        }

        return $this->ok();
    }
}
