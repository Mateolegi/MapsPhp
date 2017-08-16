<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../model/position.php';

$database = new Database();
$db = $database->getConnection();

$position = new Position($db);

$data = json_decode(file_get_contents("php://input"));

$position->latitude = $data->lat;
$position->longitude = $data->lng;

$result = $position->create();
echo '{"message": "'.$result.'"}';

?>