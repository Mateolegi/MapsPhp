<?php 

namespace App\Controller\PosicionesController;

use App\Model\Posicion;
use App\DAO\Posiciones;

class PosicionesController {
	
	/**
	 * This method call the function of posicionesDao, who manage the insertion of the database
	 * Set the info received in the object positions
	 */
	function insertPosition($lat, $lng){
		$newPosition = new Posicion($lat, $lng);

		$dataAccess = new Posiciones();

		if (!$dataAccess->createPosition($newPosition)) {
			return $newPosition;
		}
		return null;
		// header("Location: " . $_SERVER["DOCUMENT_ROOT"] . "MapsPhp/public/pages/addPosition.php?objCoor=$newPosition");
	}
}





