<?php

namespace Arrilot\SystemCheck\Console;

use Arrilot\SystemCheck\ChecksCollection;
use Arrilot\SystemCheck\Exceptions\CheckFailedException;
use Arrilot\SystemCheck\Exceptions\CheckSkippedException;
use Illuminate\Console\Command;

class SystemCheckCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'system:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check server and laravel configuration';

    /**
     * The collection of all available checks.
     *
     * @var ChecksCollection
     */
    protected $checks;

    /**
     * Constructor.
     *
     * @param ChecksCollection $checks
     */
    public function __construct(ChecksCollection $checks)
    {
        parent::__construct();

        $this->checks = $checks;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $this->info("Current environment: {$this->laravel->environment()}");

        $this->performServerChecks();
        $this->performLaravelChecks();
    }

    /**
     * Perform server configuration checks.
     */
    protected function performServerChecks()
    {
        $this->info('Server configuration checks:');

        foreach ($this->checks->getServerChecks() as $check) {
            $this->performCheck($check);
        }
    }

    /**
     * Perform laravel configuration checks.
     */
    protected function performLaravelChecks()
    {
        $this->info('Laravel configuration checks:');

        foreach ($this->checks->getLaravelChecks() as $check) {
            $this->performCheck($check);
        }
    }

    /**
     * Builds a check object and performs a check.
     *
     * @param string $class
     */
    protected function performCheck($class)
    {
        $check = new $class();

        try {
            $check->perform();
        } catch (CheckFailedException $e) {
            $this->line($e->getMessage());
        } catch (CheckSkippedException $e) {
            $this->line($e->getMessage());
        }
    }
}