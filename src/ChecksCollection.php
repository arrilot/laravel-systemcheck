<?php

namespace Arrilot\SystemCheck;

class ChecksCollection
{
    /**
     * The Laravel application instance.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $app;

    /**
     * The array of environments that are considered as "production".
     *
     * @var array
     */
    protected $productionEnvironments = [
        'production',
        'prod'
    ];

    /**
     * The array of available server configuration checks.
     *
     * @var array
     */
    protected $serverChecks = [
        'Production' => [
            Checks\Server\Common\PhpVersion::class,
            Checks\Server\Common\RequiredPhpExtensions::class,
            Checks\Server\Production\XdebugIsDisabled::class,
        ],
        'Dev' => [
            Checks\Server\Common\PhpVersion::class,
            Checks\Server\Common\RequiredPhpExtensions::class,
            Checks\Server\Dev\FunctionNestingLevel::class,
        ],
    ];

    /**
     * The array of available Laravel configuration checks.
     *
     * @var array
     */
    protected $laravelChecks = [
        'Production' => [
            Checks\Laravel\Production\OptimizedClassLoaderExists::class,
            Checks\Laravel\Production\ConfigurationIsCached::class,
            Checks\Laravel\Production\RoutesAreCached::class,
            Checks\Laravel\Common\AppKey::class,
            Checks\Laravel\Production\AppDebug::class,
            Checks\Laravel\Production\SessionDriver::class,
            Checks\Laravel\Production\CacheDriver::class,
        ],
        'Dev' => [
            Checks\Laravel\Dev\OptimizedClassLoaderDoesNotExist::class,
            Checks\Laravel\Dev\ConfigurationIsNotCached::class,
            Checks\Laravel\Dev\RoutesAreNotCached::class,
            Checks\Laravel\Common\AppKey::class,
            Checks\Laravel\Dev\AppDebug::class,
        ],
    ];

    /**
     * ChecksCollection constructor.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * Get all server checks for a given environment.
     *
     * @param string|null $env
     * @return array
     */
    public function getServerChecks($env = null)
    {
        return $this->serverChecks[$this->getModeByEnv($env)];
    }

    /**
     * Get all Laravel checks for a given environment.
     *
     * @param string|null $env
     * @return array
     */
    public function getLaravelChecks($env = null)
    {
        return $this->laravelChecks[$this->getModeByEnv($env)];
    }

    /**
     * Get checking mode by laravel environment.
     *
     * @param string|null $env
     * @return string
     */
    protected function getModeByEnv($env = null)
    {
        if (is_null($env)) {
            $env = $this->app->environment();
        }

        return in_array($env, $this->productionEnvironments) ? 'Production' : 'Dev';
    }

    /**
     * Setter for production environments.
     *
     * @param array|string $env
     * @return $this
     */
    public function setProductionEnvironments($env)
    {
        $this->productionEnvironments = (array) $env;

        return $this;
    }
}