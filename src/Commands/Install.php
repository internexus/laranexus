<?php

namespace Laranexus\Commands;

use Symfony\Component\Console\Input\InputOption;

class Install extends Command
{
    /**
     * Command description.
     *
     * @var string
     */
    protected $description = 'Install a exists Laravel project';

    /**
     * Setup command.
     */
    protected function setArgs()
    {
        $this->addOption('skip-composer', null, InputOption::VALUE_OPTIONAL, 'Skip Composer install', false);
    }

    /**
     * Copy environment files.
     *
     * @return void
     */
    protected function copyEnironmentFiles()
    {
        $envPath = $this->laranexus->getWorkingDir('.env');

        if (! file_exists($envPath)) {
            file_put_contents(
                $envPath,
                $this->laranexus->getSnippet('.env.example')
            );

            $this->laranexus->artisan()->command(['key:generate']);
        }
    }

    /**
     * Handle create command.
     *
     * @return void
     */
    public function handle()
    {
        $skipComposer = $this->input->getOption('skip-composer');

        if (null == $skipComposer || $skipComposer == false) {
            $this->info('Installing composer...');
            $this->laranexus->composer()->install();
        }

        chmod($this->laranexus->getWorkingDir('bootstrap/cache'), 0775);
        chmod($this->laranexus->getWorkingDir('storage'), 0777);

        $this->info('Setup env files...');
        $this->copyEnironmentFiles();

        // Check installation
        return $this->laranexus->artisan()->command(['--version']);
    }
}
