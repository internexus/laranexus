<?php

namespace Laranexus\Docker;

class Npm extends Docker
{
    /**
     * Install NPM package.
     *
     * @param  string   $name
     * @param  string   $version
     * @param  boolean  $isDev
     * @return string
     */
    public function install($name = null, $version = null, $isDev = false)
    {
        if (! $name) {
            return $this->run('node', ['npm', 'i']);
        }

        return $this->run('node', [
            'npm',
            'i',
            $isDev ? '--save' : '--save-dev',
            $name,
            $version,
        ]);
    }

    /**
     * Remove NPM package.
     *
     * @param  string   $name
     * @param  string   $version
     * @param  boolean  $isDev
     * @return string
     */
    public function remove($name)
    {
        return $this->run('node', [
            'npm',
            'remove',
            '--save',
            $name,
        ]);
    }

    /**
     * Run package.json script.
     *
     * @param  string   $name
     * @param  string   $version
     * @param  boolean  $isDev
     * @return string
     */
    public function runScript($name)
    {
        return $this->run('node', [
            'npm',
            'run',
            $name,
        ]);
    }
}
