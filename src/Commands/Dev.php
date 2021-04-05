<?php

namespace Laranexus\Commands;

class Dev extends Server
{
    /**
     * Command name.
     *
     * @var  string
     */
    protected static $defaultName = 'dev';

    /**
     * Command description.
     *
     * @var string
     */
    protected $description = 'Start dev enviromment';

    /**
     * Handle start command.
     *
     * @return void
     */
    public function handle()
    {
        parent::handle();

        $this->laranexus->npm()->run('watch');
    }
}
