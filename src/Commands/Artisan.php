<?php

namespace Laranexus\Commands;

use Symfony\Component\Console\Input\InputArgument;

class Artisan extends Command
{
    /**
     * Command description.
     *
     * @var string
     */
    protected $description = 'Run artisan commands';

    /**
     * Set argument variables.
     */
    protected function setArgs()
    {
        $this->addArgument('args', InputArgument::OPTIONAL, 'The artisan arguments.');
    }

    /**
     * Handle start command.
     *
     * @return void
     */
    public function handle()
    {
        $args = explode(' ', $this->input->getArgument('args'));

        $this->laranexus->artisan()->command($args);
    }
}
