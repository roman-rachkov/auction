<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Slim\Factory\AppFactory;

return static function (ContainerInterface $container) {
    $app = AppFactory::createFromContainer($container);

    (require_once __DIR__ . "/../config/middleware.php")($app, $container);
    (require_once __DIR__ . "/../config/routes.php")($app);
    return $app;
};
