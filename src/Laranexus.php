<?php

namespace Laranexus;

use Exception;
use Laranexus\Docker\Server;
use Laranexus\Docker\Artisan;
use Laranexus\Docker\Composer;

class Laranexus
{
    /**
     * Enable debug
     *
     * @var string
     */
    protected $debug = false;

    /**
     * Current working directory.
     *
     * @var string
     */
    protected $workingDir;

    /**
     * Set current working directory.
     *
     * @param  string  $workingDir
     * @return $this
     */
    public function setWorkingDir($workingDir)
    {
        $this->workingDir = $workingDir;

        return $this;
    }

    /**
     * Get working directory.
     *
     * @param  string  $path
     * @return string
     */
    public function getWorkingDir($path = null)
    {
        $fullpath = $this->workingDir;

        if ($path) {
            return $fullpath . '/' . trim($path, '/');
        }

        return $fullpath;
    }

    /**
     * Get file snippet.
     *
     * @param  string  $filename
     * @return string
     *
     * @throws \Exception
     */
    public function getSnippet($filename)
    {
        $filepath = __DIR__ . '/snippets/' . trim($filename, '/');

        if (! file_exists($filepath)) {
            throw new \Exception("Snippet '{$filename}' not found");
        }

        return file_get_contents($filepath);
    }

    /**
     * Set debug enable/disable.
     *
     * @param  boolean  $enable
     * @return $this;
     */
    public function setDebug(bool $enable)
    {
        $this->debug = $enable;

        return $this;
    }

    /**
     * Check if debug is enable.
     *
     * @return boolean
     */
    public function isDebug()
    {
        return $this->debug == true;
    }

    /**
     * Get Docker 'server' service instance.
     *
     * @return \Laranexus\Docker\Server
     */
    public function server()
    {
        return new Server($this->workingDir);
    }

    /**
     * Get Docker 'artisan' service instance.
     *
     * @return \Laranexus\Docker\Server
     */
    public function artisan()
    {
        return new Artisan($this->workingDir);
    }

    /**
     * Get Docker 'composer' service instance.
     *
     * @return \Laranexus\Docker\Server
     */
    public function composer()
    {
        return new Composer($this->workingDir);
    }
}
