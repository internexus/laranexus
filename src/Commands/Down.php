<?php

namespace Laranexus\Commands;

class Down extends Command
{
    /**
     * Command name.
     *
     * @var  string
     */
    protected static $defaultName = 'down';

    /**
     * Handle down command.
     *
     * @return void
     */
    public function handle()
    {
        $this->laranexus->server()->down();
    }
}
