<?php

declare(strict_types=1);

$files = array_merge(
    glob(__DIR__ . '/common/*.php') ?: [],
    glob(__DIR__ . DIRECTORY_SEPARATOR . (getenv('APP_ENV') ?: 'prod') . DIRECTORY_SEPARATOR . '*.php') ?: [],
);
/**
 * @psalm-suppress UnresolvableInclude
 * @psalm-suppress MixedReturnStatement
 * @psalm-suppress MixedInferredReturnType
 */
$configs = array_map(fn(string $file): array => require $file, $files);

return array_merge_recursive(...$configs);
