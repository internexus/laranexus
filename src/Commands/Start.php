<?php

namespace Laranexus\Commands;

class Start extends Command
{
    /**
     * Command name.
     *
     * @var  string
     */
    protected static $defaultName = 'start';

    /**
     * Handle start command.
     *
     * @return void
     */
    public function handle()
    {
        $this->laranexus->server()->start();
        $this->info('Running server on http://localhost');
    }
}
