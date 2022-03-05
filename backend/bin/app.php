#!/usr/bin/env php
<?php

declare(strict_types=1);

use Symfony\Component\Console\Command\Command;

require __DIR__ . '/../vendor/autoload.php';

$container = require __DIR__ . '/../config/container.php';

$cli = new \Symfony\Component\Console\Application('Console');

/**
 * @var string[] $commands
 * @psalm-suppress MixedArrayAccess
 */
$commands = $container->get('config')['console']['commands'];

foreach ($commands as $command) {
    /**
     * @var Command $command
     */
    $command = $container->get($command);
    $cli->add($command);
}

$cli->run();
