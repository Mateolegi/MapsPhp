<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/core.php';
include_once '../shared/utilities.php';
include_once '../config/database.php';
include_once '../model/position.php';

$utilities = new Utilities();

$database = new Database();
$db = $database->getConnection();

$position = new Position($db);

$stmt = $position->readPaging($from_record_num, $records_per_page);
$num = $stmt->rowCount();

if ($num > 0) {
	$positions_arr = array();
	$positions_arr['records'] = array();
	$positions_arr['paging'] = array();

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
		$positions_item = array(
			'id' => $id,
			'lat' => $lat,
			'lng' => $lng
		);
		array_push($products_arr['records'], $position_item);
	}
	$total_rows = $position->count();
	$page_url = "{$home_url}product/read_paging.php?";
	$paging = $utilities->getPaging($page, $total_rows, $records_per_page, $page_url);
	$positions_arr['paging'] = $paging;

	echo json_encode($positions_arr);
} else {
	echo json_encode(array('message' => 'No positions found.'));
}


?>