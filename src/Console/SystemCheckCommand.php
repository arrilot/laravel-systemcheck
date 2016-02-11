<?php

namespace Arrilot\SystemCheck\Console;

use Arrilot\SystemCheck\ChecksCollection;
use Arrilot\SystemCheck\Exceptions\FailException;
use Arrilot\SystemCheck\Exceptions\NoteException;
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
        $this->output->writeln("<info>Current environment:</info> <comment>{$this->laravel->environment()}</comment>");
        $this->output->newLine();

        $this->performServerChecks();
        $this->performLaravelChecks();
    }

    /**
     * Perform server configuration checks.
     */
    protected function performServerChecks()
    {
        $this->info('Server configuration checks:');

        $rows = [];

        foreach ($this->checks->getServerChecks() as $check) {
            $rows[] = $this->performCheck($check);
        }

        $this->displayRows($rows);
    }

    /**
     * Perform laravel configuration checks.
     */
    protected function performLaravelChecks()
    {
        $this->info('Laravel configuration checks:');

        $rows = [];

        foreach ($this->checks->getLaravelChecks() as $check) {
            $rows[] = $this->performCheck($check);
        }

        $this->displayRows($rows);
    }

    /**
     * Builds a check object and performs a check.
     *
     * @param string $class
     *
     * @return array
     */
    protected function performCheck($class)
    {
        $check = new $class($this->laravel);

        $result = '<info>Ok</info>';
        $comment = '';

        try {
            $check->perform();
        } catch (FailException $e) {
            $result = '<error>Fail</error>';
            $comment = $e->getMessage();
        } catch (NoteException $e) {
            $result = '<comment>Note</comment>';
            $comment = $e->getMessage();
        }

        return [
            'Check'   => $check->getDescription(),
            'Result'  => $result,
            'Comment' => $comment,
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
}