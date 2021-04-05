<?php

copy('https://github.com/internexus/laranexus/blob/main/laranexus.phar?raw=true', 'laranexus.phar');

$homeDir = $_SERVER['HOME'] . '/.laranexus';

if (! is_dir($homeDir)) {
    mkdir($homeDir);
}

$phar = new Phar('laranexus.phar');
$phar->extractTo($homeDir, 'src/docker-compose.yml', true);
unlink('laranexus-seup.php');
