#!/usr/bin/env php
<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$container = require __DIR__ . '/../config/container.php';

$cli = new \Symfony\Component\Console\Application('Console');

$commands = $container->get('config')['console']['commands'];

foreach ($commands as $command) {
    $cli->add($container->get($command));
}

$cli->run();