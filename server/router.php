<?php

$router->get('/', function() {
	return view('/index.html');
});

$router->post('/location/new', function() {
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];
	$controller = new App\Controller\PosicionesController;
	$controller->insertPosition($latitude, $longitude);
});

$router->add('/.*', function () {
    header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
    echo '<h1>404 - El sitio solicitado no existe</h1>';
});