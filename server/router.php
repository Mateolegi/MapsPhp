<?php

$router->get('/', function() {
	return view('/welcome.php');
});

$router->add('/*.', function() {
	// 404
});

// $router->add("/".'(\\/)(public)(\\/)((?:[a-z][a-z]+))(\\/)((?:[a-z][a-z]+))(\\.)((?:[a-z][a-z]+))'."/is", function() {
// 	return view()
// });

$router->add('/public(\\/)([a-zA-Z]+)', function($path) {
	return view($path);
});