<?php

namespace Arrilot\SystemCheck\Checks\Laravel\Dev;

use Arrilot\SystemCheck\CheckResult;
use Arrilot\SystemCheck\Checks\Check;

class AppDebug extends Check
{
    /**
     * The check description.
     *
     * @var string
     */
    protected $description = 'app.debug';

    /**
     * Perform the check.
     *
     * @return CheckResult
     */
    public function perform()
    {
        if (!$this->app['config']['app.debug']) {
            return $this->fail("app.debug should not be set to 'false' in production");
        }

        return $this->ok();
    }
}
