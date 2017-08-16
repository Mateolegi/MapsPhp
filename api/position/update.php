<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'api/config/database.php';
include_once 'api/model/position.php';

$database = new Database();
$db = $database->getConnection();

$position = new Position($db);

$data = json_decode(file_get_contents("php://input"));

$position->id = isset($_GET['id']) ? $_GET['id'] : die();
$position->latitude = $data->lat;
$position->longitude = $data->lng;

if ($position->update()) {
	echo '{';
	echo '"message": "Position was updated."';
	echo '}';
} else {
	echo '{';
	echo '"message": "Unable to update position."';
	echo '}';
}

?>