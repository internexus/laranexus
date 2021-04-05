<?php

namespace Laranexus\Commands;

class Server extends Command
{
    /**
     * Command name.
     *
     * @var  string
     */
    protected static $defaultName = 'server';

    /**
     * Command description.
     *
     * @var string
     */
    protected $description = 'Start PHP server';

    /**
     * Handle start command.
     *
     * @return void
     */
    public function handle()
    {
        $this->laranexus->server()->start();
        $this->laranexus->artisan()->command('queue:listen');

        $this->info('Running server on http://localhost');
    }
}
