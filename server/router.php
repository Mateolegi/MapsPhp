<?php

$router->get('/', function() {
	return view('/index.html');
});

$router->post('/position/create', function() {
	include_once 'api/position/create.php';
});

$router->get('/position', function() {
	include_once 'api/position/read.php';
});

$router->get('/position/([0-9])', function($id) {
	$_GET['id'] = $id;
	include_once 'api/position/read_one.php';
});

$router->delete('/position/([0-9])', function($id) {
	$_GET['id'] = $id;
	include_once 'api/position/delete.php';
});

$router->put('/position/([0-9])', function($id) {
	$_GET['id'] = $id;
	include_once 'api/position/update.php';
});

$router->add('/.*', function () {
    header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
    echo '<h1>404 - El sitio solicitado no existe</h1>';
});