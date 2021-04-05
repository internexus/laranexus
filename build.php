<?php

try {
    $pharFile = 'laranexus.phar';

    if (file_exists($pharFile)) {
        unlink($pharFile);
    }

    if (file_exists($pharFile . '.gz')) {
        unlink($pharFile . '.gz');
    }

    $phar = new Phar($pharFile);
    $phar->startBuffering();
    $phar->buildFromDirectory(__DIR__);
    $phar->setDefaultStub('src/laranexus', '/index.php');
    $phar->stopBuffering();
    $phar->compressFiles(Phar::GZ);

    # Make the file executable
    chmod(__DIR__ . '/' .  $pharFile, 0770);

    echo "$pharFile successfully created" . PHP_EOL;
} catch (Exception $e) {
    echo $e->getMessage() . "\n";
}
