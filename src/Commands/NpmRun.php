<?php

namespace Laranexus\Commands;

use Symfony\Component\Console\Input\InputArgument;

class NpmRun extends Command
{
    /**
     * Command name.
     *
     * @var  string
     */
    protected static $defaultName = 'npm:run';

    /**
     * Command description.
     *
     * @var string
     */
    protected $description = 'Run a NPM script';

    /**
     * Set argument variables.
     */
    protected function setArgs()
    {
        $this->addArgument('script', InputArgument::OPTIONAL, 'The NPM script name.');
    }

    /**
     * Handle start command.
     *
     * @return void
     */
    public function handle()
    {
        $this->laranexus->npm()->runScript(
            $this->input->getArgument('script')
        );
    }
}
