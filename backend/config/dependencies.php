<?php

declare(strict_types=1);

$files = array_merge(
    glob(__DIR__ . '/common/*.php') ?: [],
    glob(__DIR__ . DIRECTORY_SEPARATOR . (getenv('APP_ENV') ?: 'prod') . DIRECTORY_SEPARATOR . '*.php') ?: [],

);

$configs = array_map(fn($file) => require $file, $files);

return array_merge_recursive(...$configs);
