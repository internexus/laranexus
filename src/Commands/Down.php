<?php

namespace Laranexus\Commands;

class Down extends Command
{
    /**
     * Command description.
     *
     * @var string
     */
    protected $description = 'Stops and remove all container';

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
