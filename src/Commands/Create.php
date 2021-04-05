<?php

namespace Laranexus\Commands;

class Create extends Command
{
    /**
     * Command name.
     *
     * @var string
     */
    protected static $defaultName = 'create';

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

            $this->laranexus->artisan()->runCommand(['key:generate']);
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
    }
}
