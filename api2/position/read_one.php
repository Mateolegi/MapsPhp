<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once '../config/database.php';
include_once '../model/position.php';

$database = new Database();
$db = $database->getConnection();

$position = new Position($db);

$position->id = isset($_GET['id']) ? $_GET['id'] : die();

$position->readOne();

$positions_arr = array(
    "id" =>  $position->id,
    "latitude" => $position->latitude,
    "longitude" => $position->longitude
);

print_r(json_encode($positions_arr));

?>