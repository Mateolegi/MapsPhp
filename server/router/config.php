<?php

include_once(__DIR__ . '/Route.php');

$routerFile = file_get_contents(__DIR__ . '/router.json');
$routes = json_decode($routerFile, true);
$routesList = array();

foreach ($routes as $route) {
  $method = $route['method'];
  $uri = $route['uri'];
  $response = $route['response'];
  $routeType = $route['routeType'];
  array_push($routesList,new Route($method, $uri, $response, $routeType));
}

foreach ($routesList as $route) {
  if ($_SERVER["REQUEST_URI"] === $route->getURI()) {
    if ($route->getMethod() == 'GET' or $route->getMethod() == 'get') {
      if ($route->getRouteType() == 'web') {
        include_once($publicFolder . $route->getResponse());
      }
    }
  }
}
