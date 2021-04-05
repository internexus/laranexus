<?php

namespace Laranexus\Docker;

class Composer extends Docker
{
    /**
     * Create composer project.
     *
     * @param  string  $path
     * @return string
     */
    public function create($path)
    {
        return $this->run('composer', ['create-project', 'laravel/laravel', $path]);
    }

    /**
     * Install all composer packages.
     *
     * @return string
     */
    public function install()
    {
        return $this->run('composer', ['install']);
    }

    /**
     * Install a composer package.
     *
     * @param  string  $package
     * @param  string  $version
     * @return string
     */
    public function require($package, $version = null)
    {
        return $this->run('composer', ['require', $package, $version]);
    }
}
