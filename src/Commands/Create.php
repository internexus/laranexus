<?php

namespace Laranexus\Commands;

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
     * Copy environment files.
     *
     * @return void
     */
    protected function copyEnironmentFiles()
    {
        file_put_contents(
            $this->laranexus->getWorkingDir('.env'),
            $this->laranexus->getSnippet('.env.example')
        );
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
        $this->laranexus->setWorkingDir($this->laranexus->getWorkingDir() . '/' . $this->input->getArgument('name'));

        $this->info('Setup env files...');
        $this->copyEnironmentFiles();

        // Check installation
        return $this->laranexus->artisan()->command(['--version']);
    }
}
