<?php 

include_once('../Dao/posicionesDao.php');
/**
* 
*/
class PosicionesController{

	public static function insertPosition(){
		$objPosition = new Posiciones();
		$objPosition->setLat(1234.5);
		$objPosition->setLng(6789.10);
	}

}

