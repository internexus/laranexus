<?php

namespace Laranexus\Commands;

use Symfony\Component\Console\Input\InputArgument;

class NpmInstall extends Command
{
    /**
     * Command name.
     *
     * @var  string
     */
    protected static $defaultName = 'npm:install';

    /**
     * Command description.
     *
     * @var string
     */
    protected $description = 'Install a NPM package';

    /**
     * Set arguments variables.
     */
    protected function setArgs()
    {
        $this->addArgument('package', InputArgument::OPTIONAL, 'The NPM package name.');
        $this->addArgument('version', InputArgument::OPTIONAL, 'The NPM package version.');
        $this->addArgument('dev', InputArgument::OPTIONAL, 'Install the NPM package on dev requirements.');
    }

    /**
     * Handle start command.
     *
     * @return void
     */
    public function handle()
    {
        $this->laranexus->npm()->install(
            $this->input->getArgument('package'),
            $this->input->getArgument('version'),
            $this->input->getArgument('dev') == 'dev'
        );
    }
}
