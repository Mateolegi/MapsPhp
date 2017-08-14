<?php

namespace App\Controller;

use App\Model\Position;

class PosicionesController {

	/**
	 * This method call the function of posicionesDao, who manage the insertion of the database
	 * Set the info received in the object positions
	 */
	function insertPosition($lat, $lng) {
		$newPosition = new \App\Model\Position($lat, $lng);
		// echo json_encode($newPosition);
		echo "something is broke";
		// $dataAccess = new Posiciones();

		// if (!$dataAccess->createPosition($newPosition)) {
		// 	return $newPosition;
		// }
		// return null;
		// header("Location: " . $_SERVER["DOCUMENT_ROOT"] . "MapsPhp/public/pages/addPosition.php?objCoor=$newPosition");
	}
}





