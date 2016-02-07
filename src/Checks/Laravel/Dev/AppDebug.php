<?php

namespace Arrilot\SystemCheck\Checks\Laravel\Dev;

use Arrilot\SystemCheck\Checks\BaseCheck;

class AppDebug extends BaseCheck
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
     * @return void
     */
    public function perform()
    {
        if (! $this->app['config']['app.debug']) {
            $this->fail("app.debug should not be set to 'false' in production");
        }
    }
}