<?php 
include_once($_SERVER["DOCUMENT_ROOT"]."/MapsPhp/app/db/db_connection.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/MapsPhp/app/Entities/posiciones.php");

/** 
*	this class manage the entire info of the entity Posicion.
*/
class PosicionesDao extends Connection{

// Main methods

	public static function createPosition($posicion){
		$cnx = self::connect();
		$sql = "INSERT INTO positions ( lat , lng ) VALUES ( {$posicion->getLat() } , {$posicion->getLng() } ) " ;
		return $cnx->query($sql);
	} 

	// public static function validarPosicion($posicion){
	// 	$cnx = self::connect();
	// 	$sql = "SELECT * FROM positions where id= "1" ";
	// 	echo $cnx->query($sql);
	// 

// }	

}