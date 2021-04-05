<?php

namespace Laranexus\Commands;

use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;

class Command extends \Symfony\Component\Console\Command\Command
{
    /**
     * Laranexus instance.
     *
     * @var \Laranexus\Laranexus
     */
    protected $laranexus;

    /**
     * Command input arguments.
     *
     * @var \Symfony\Component\Console\Input\InputInterface
     */
    protected $input;

    /**
     * Command input arguments.
     *
     * @var \Symfony\Component\Console\Output\OutputInterface
     */
    protected $output;

    /**
     * Laranexus instance.
     *
     * @param \Laranexus\Laranexus  $laranexus
     */
    public function __construct($laranexus)
    {
        $this->laranexus = $laranexus;

        parent::__construct();
    }

    /**
     * Output a info message.
     *
     * @param  string  $message
     * @return void
     */
    protected function info($message)
    {
        $this->output->writeln("<info>{$message}</info>");
    }

    /**
     * Handle command.
     */
    public function handle()
    {
        //
    }

    /**
     * Execute command.
     *
     * @param  \Symfony\Component\Console\Input\InputInterface    $input
     * @param  \Symfony\Component\Console\Output\OutputInterface  $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->input = $input;
        $this->output = $output;

        $this->handle();

        return self::SUCCESS;
    }
}
