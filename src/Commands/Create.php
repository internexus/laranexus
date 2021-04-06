<?php

namespace Laranexus\Commands;

use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputArgument;

class Create extends Command
{
    /**
     * Command description.
     *
     * @var string
     */
    protected $description = 'Create a new Laravel project';

    /**
     * Setup command.
     */
    protected function setArgs()
    {
        $this->addArgument('name', InputArgument::REQUIRED, 'Project name');
    }

    /**
     * Handle create command.
     *
     * @return void
     */
    public function handle()
    {
        $this->info('Installing composer...');
        $this->laranexus->composer()->create($this->input->getArgument('name'));
        $this->laranexus->setWorkingDir($this->laranexus->getWorkingDir($this->input->getArgument('name')));

        unlink($this->laranexus->getWorkingDir('.env'));

        $cmd = $this->getApplication()->find('install');
        $cmd->run(new ArrayInput(['--skip-composer' => true]), $this->output);
    }
}
