<?php

namespace Arrilot\SystemCheck;

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
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $this->info('Checking server and laravel configuration');
        $this->info('Current environment: ' . $this->laravel->environment());
    }
}