<?php

namespace Arrilot\SystemCheck;

class ChecksCollection
{
    /**
     * The Laravel application instance.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $laravel;

    /**
     * The array of available checks.
     *
     * @var array
     */
    protected $checks = [
        'Server' => [
            'Production' => [
                Checks\Server\Common\PhpVersionCheck::class,
                Checks\Server\Common\PhpExtensionsCheck::class,
            ],
            'Dev' => [
                Checks\Server\Common\PhpVersionCheck::class,
                Checks\Server\Common\PhpExtensionsCheck::class,
            ],
        ],
        'Laravel' => [
            'Production' => [],
            'Dev' => [],
        ],
    ];

    /**
     * ChecksCollection constructor.
     *
     * @param \Illuminate\Contracts\Foundation\Application $laravel
     */
    public function __construct($laravel)
    {
        $this->laravel = $laravel;
    }

    /**
     * Get all server checks for a given environment.
     *
     * @param string|null $env
     * @return array
     */
    public function getServerChecks($env = null)
    {
        return $this->getChecksWithType('Server', $env);
    }

    /**
     * Get all laravel checks for a given environment.
     *
     * @param string|null $env
     * @return array
     */
    public function getLaravelChecks($env = null)
    {
        return $this->getChecksWithType('Laravel', $env);
    }

    /**
     * @param string $type
     * @param string|null $env
     * @return array
     */
    protected function getChecksWithType($type, $env = null)
    {
        if (is_null($env)) {
            $env = $this->laravel->environment();
        }

        return $this->checks[$type][$this->getModeByEnv($env)];
    }

    /**
     * Get checking mode by laravel environment.
     *
     * @param string $env
     * @return string
     */
    protected function getModeByEnv($env)
    {
        return in_array($env, ['production', 'prod']) ? 'Production' : 'Dev';
    }
}