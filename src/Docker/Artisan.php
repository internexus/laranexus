<?php

namespace Laranexus\Docker;

class Artisan extends Docker
{
    /**
     * Run artisan command.
     *
     * @param  array  $args
     * @return string
     */
    public function command($args = [])
    {
        return $this->run('php', array_merge(['artisan'], $args));
    }
}
