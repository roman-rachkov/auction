<?php

declare(strict_types=1);

use Slim\App;
use Psr\Container\ContainerInterface;

return static function (App $app, ContainerInterface $container) {
    /**
     * @psalm-var array{debug:bool}
     */
    $config = $container->get('config');
    $app->addErrorMiddleware($config['debug'], true, true);
};
