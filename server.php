<?php

// include 'server/Router/Route.php';
// include 'server/Router/Router.php';
// include('api/Controller/PosicionesController.php');
// use \App\Controller;
// use \App\DAO;
// use \App\Database;
// use \App\Model;

$env = parse_ini_file('.env', true);

$loader = require 'vendor/autoload.php';
$loader->add('App\\', __DIR__ . '/api');
$loader->add('Server\\', __DIR__ . '/server');

function view($path = '/') {
	include_once __DIR__.'/public' . $path;
}

use Server\Router\Router;

$router = new Server\Router\Router();

require_once('server/router.php');

$router->route();
