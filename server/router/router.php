<?php

namespace Server\Router\Router;

use Phroute\Phroute\RouteCollector;

class Router {

  use RouteCollector;

  $router = new RouteCollector();

  $router->get('/', function () {
    return 'Works';
  });
}
