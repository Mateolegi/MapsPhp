<?php 
include_once($_SERVER["DOCUMENT_ROOT"].'/MapsPhp/app/Dao/PosicionesDao.php');

/**
* 
*/
class PosicionesController {
	

/**
 * This method call the function of posicionesDao, who manage the insert of the database
 * As well as set the info recived in the object positions
 */
	function insertPosition( $lat , $lng ){
		$objPosition = new Posiciones();
		$objPosition->setLat($lat);
		$objPosition->setLng($lng);

		$posDao = new PosicionesDao();

		if ( !$posDao->createPosition($objPosition)) {
			return " so how are you m8?";
		}

		return " Good Job Alex";

		// header("Location: " . $_SERVER["DOCUMENT_ROOT"] . "MapsPhp/public/pages/addPosition.php?objCoor=$objPosition");
	}
}





