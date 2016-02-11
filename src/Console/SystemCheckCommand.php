<?php

namespace Arrilot\SystemCheck\Console;

use Arrilot\SystemCheck\ChecksCollection;
use Illuminate\Console\Command;
use InvalidArgumentException;

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
     * The table headers for the command.
     *
     * @var array
     */
    protected $headers = ['Check', 'Result', 'Comment'];

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
        $env = is_null($this->option('env'))
            ? $this->laravel->environment()
            : $this->option('env');

        $this->output->writeln("<info>Performing checks for environment:</info> <comment>{$env}</comment>");
        $this->output->newLine();

        $this->performServerChecks($env);
        $this->performLaravelChecks($env);
    }

    /**
     * Perform server configuration checks.
     *
     * @param string $env
     *
     * @return void
     */
    protected function performServerChecks($env)
    {
        $this->info('Server configuration checks:');

        $this->performChecks($this->checks->getServerChecks($env));
    }

    /**
     * Perform laravel configuration checks.
     *
     * @param string $env
     *
     * @return void
     */
    protected function performLaravelChecks($env)
    {
        $this->info('Laravel configuration checks:');

        $this->performChecks($this->checks->getLaravelChecks($env));
    }

    /**
     * Perform configuration checks.
     *
     * @param array $checks
     *
     * @return void
     */
    protected function performChecks($checks)
    {
        $rows = [];

        foreach ($checks as $check) {
            if ($row = $this->performCheck($check)) {
                $rows[] = $row;
            }
        }

        $this->displayRows($rows);
    }

    /**
     * Build a check object and perform a check.
     *
     * @param string $class
     *
     * @return array
     */
    protected function performCheck($class)
    {
        $check = new $class($this->laravel);
        $result = $check->perform();

        if ($result->status == 'Skip') {
            return [];
        }

        return [
            'Check'   => $check->getDescription(),
            'Result'  => $this->styleStatus($result->status),
            'Comment' => $result->comment,
        ];
    }

    /**
     * Display all given rows as a table.
     *
     * @param array $rows
     */
    protected function displayRows(array $rows)
    {
        $this->table($this->headers, $rows);

        $this->output->newLine();
    }

    /**
     * Add some styling to status.
     *
     * @param string $status
     *
     * @return string
     */
    protected function styleStatus($status)
    {
        if ($status === 'Ok') {
            return '<info>Ok</info>';
        }

        if ($status === 'Note') {
            return '<comment>Note</comment>';
        }

        if ($status === 'Fail') {
            return '<error>Note</error>';
        }

        throw new InvalidArgumentException("Check can not return status '{$status}'");
    }
}
