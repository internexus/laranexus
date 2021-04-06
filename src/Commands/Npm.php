<?php

namespace Laranexus\Commands;

use Symfony\Component\Console\Input\InputArgument;

class Npm extends Command
{
    /**
     * Command description.
     *
     * @var string
     */
    protected $description = 'Run NPM';

    /**
     * Set argument variables.
     */
    protected function setArgs()
    {
        $this->addArgument('args', InputArgument::OPTIONAL, 'The composer arguments.');
    }

    /**
     * Handle start command.
     *
     * @return void
     */
    public function handle()
    {
        $args = explode(' ', $this->input->getArgument('args'));

        $this->laranexus->npm()->command($args);
    }
}
