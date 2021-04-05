<?php

namespace Laranexus\Commands;

use Symfony\Component\Console\Input\InputArgument;

class NpmRemove extends Command
{
    /**
     * Command name.
     *
     * @var  string
     */
    protected static $defaultName = 'npm:remove';

    /**
     * Command description.
     *
     * @var string
     */
    protected $description = 'Remove a NPM package';

    /**
     * Set argument variables.
     */
    protected function setArgs()
    {
        $this->addArgument('package', InputArgument::OPTIONAL, 'The NPM package name.');
    }

    /**
     * Handle start command.
     *
     * @return void
     */
    public function handle()
    {
        $this->laranexus->npm()->remove(
            $this->input->getArgument('package')
        );
    }
}
