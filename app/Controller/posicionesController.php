<?php 
extract($_REQUEST);
include_once($_SERVER["DOCUMENT_ROOT"].'/MapsPhp/app/Dao/posicionesDao.php');

if ( !empty( $consultar ) ) {
	insertPosition( $lat, $lng);
}

function insertPosition( $lat , $lng ){

	$objPosition = new Posiciones();
	$objPosition->setLat($lat);
	$objPosition->setLng($lng);
	
	$resultado = PosicionesDao::createPosition($objPosition);
	header("Location: " . $_SERVER["DOCUMENT_ROOT"] . "MapsPhp/public/pages/addPosition.php");
}



