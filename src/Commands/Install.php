<?php

namespace Laranexus\Commands;

class Install extends Command
{
    /**
     * Command description.
     *
     * @var string
     */
    protected $description = 'Install a exists Laravel project';

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
        $this->info('Installing composer...');
        $this->laranexus->composer()->install();

        $this->info('Setup env files...');
        $this->copyEnironmentFiles();

        // Check installation
        return $this->laranexus->artisan()->command(['--version']);
    }
}
