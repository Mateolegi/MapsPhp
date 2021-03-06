<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8)");

include_once 'api/config/database.php';
include_once 'api/model/position.php';

$database = new Database();
$db = $database->getConnection();

$position = new Position($db);

$stmt = $position->read();
$num = $stmt->rowCount();

if ($num > 0) {
	$positions_arr = array();
	$positions_arr['records'] = array();

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
		$position_item = array(
			'id' => $id,
			'lat' => $lat,
			'lng' => $lng,
		);
		array_push($positions_arr['records'], $position_item);
	}
	echo json_encode($positions_arr);
} else {
	echo json_encode(array('message' => 'No positions found'));
}

?>