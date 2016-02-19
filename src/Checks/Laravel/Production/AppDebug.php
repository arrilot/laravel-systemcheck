<?php

namespace Arrilot\SystemCheck\Checks\Laravel\Production;

use Arrilot\SystemCheck\Checks\Check;
use Arrilot\SystemCheck\CheckResult;

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
        if ($this->app['config']['app.debug']) {
            return $this->fail("app.debug should not be set to 'true' in production");
        }

        return $this->ok();
    }
}
