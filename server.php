<?php

$env = parse_ini_file('.env', true);

function view($path = '/') {
	include_once __DIR__.'/public' . $path;
}

include_once 'server/Router/router.php';

$router = new Router();

require_once('server/router.php');

$router->route();
