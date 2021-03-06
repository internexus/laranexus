<?php

namespace Laranexus\Docker;

use Symfony\Component\Process\Process;

class Docker
{
    /**
     * Show docker-compose outputs.
     *
     * @var boolean
     */
    protected $debug;

    /**
     * Docker Compose binary path.
     *
     * @var string
     */
    protected $binaryPath = 'docker-compose';

    /**
     * Current Working Dir
     *
     * @var string
     */
    protected $workingDir;

    /**
     * Docker Compose file path.
     *
     * @var string
     */
    protected $composeFile;

    /**
     * Constructor.
     *
     * @param  string  $workingDir
     * @param  boolean $debug
     */
    public function __construct($workingDir, $debug = false)
    {
        $this->debug = $debug;
        $this->workingDir = $workingDir;

        if (\Phar::running()) {
            $this->composeFile = $_SERVER['HOME'] . '/.laranexus/src/docker-compose.yml';
        } else {
            $this->composeFile = __DIR__ . '/../docker-compose.yml';
        }
    }

    /**
     * Set docker-compose binary path.
     *
     * @param  string  $binaryPath
     * @return $this
     */
    public function setBinaryPath($binaryPath)
    {
        $this->binaryPath = $binaryPath;

        return $this;
    }

    /**
     * Statr a docker-compose container.
     *
     * @param  string  $service
     * @return string
     */
    public function up($service)
    {
        $args = [
            'up',
            $service,
        ];

        return $this->execute($args);
    }

    /**
     * Run docker-compose service.
     *
     * @param  string  $service
     * @param  array   $args
     * @return string
     */
    public function run($service, $args)
    {
        $base = [
            'run',
            '--user',
            getmyuid() . ':' . getmygid() ,
            '-v',
            "{$this->workingDir}:/app",
            '--rm',
            $service,
        ];

        return $this->execute(array_merge($base, $args));
    }

    /**
     * Run docker-compose service.
     *
     * @param  array  $args
     * @return string
     *
     * @throws \Exception
     */
    protected function execute($args)
    {
        $docker = [
            $this->binaryPath,
            '-f',
            $this->composeFile
        ];

        $env = [
            'WORKING_DIR' => $this->workingDir,
            'VOLUME_PREFIX' => 'laranexus',
        ];

        $process = new Process(array_merge($docker, $args), null, $env);

        // @todo: only on `up` calls the timeout must be null
        $process->setTimeout(null);
        $process->setIdleTimeout(null);

        $process->run(function($a, $output) {
            if ($this->debug) {
                echo $output;
            }
        });

        if (! $process->isSuccessful()) {
            $cmd = implode(' ', array_merge($docker, $args));

            throw new \Exception('Process "' . $cmd . '" failed');
        }

        return $process->getOutput();
    }

    /**
     * Check if docker-compose is available.
     *
     * @return boolean
     */
    public function check()
    {
        $process = new Process([$this->binaryPath, '--version']);
        $process->run();

        return $process->isSuccessful();
    }
}
