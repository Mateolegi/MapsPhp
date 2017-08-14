<?php

include 'server/Router/Route.php';
include 'server/Router/Router.php';

$env = parse_ini_file('.env', true);

function view($path = '/') {
	include_once 'C:\Users\mateo\Desktop\public' . $path;
}

$router = new Router\Router();

$router->add('/', function ($name) {
    echo sprintf('<h1>Hola %s</h1>', $name);
});
$router->add('/.*', function () {
    header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
    echo '<h1>404 - El sitio solicitado no existe</h1>';
});

$router->route();

// $loader = require 'vendor/autoload.php';
// $loader->add('App', __DIR__.'/api/');

// include __DIR__ . '/vendor/autoload.php';

// use Phroute\Phroute\RouteCollector;
// use Phroute\Phroute\Dispatcher;

// $collector = new RouteCollector();

// $collector->get('/', function(){
//     return view('/welcome.php');
// });

// $collector->post('products', function(){
//     return 'Create Product';
// });
// $collector->put('items/{id}', function($id){
//     return 'Amend Item ' . $id;
// });

// $dispatcher = new Dispatcher($collector->	getData());
// echo $dispatcher->dispatch('GET', '/'), "\n";   // Home Page
// echo $dispatcher->dispatch('POST', '/products'), "\n"; // Create Product
// echo $dispatcher->dispatch('PUT', '/items/123'), "\n"; // Amend Item 123
