<?php

namespace Laranexus\Docker;

class Server extends Docker
{
    /**
     * Start server.
     *
     * @return string
     */
    public function start()
    {
        return $this->up('server');
    }

    /**
     * Start server.
     *
     * @return string
     */
    public function down()
    {
        return $this->execute(['down']);
    }
}
