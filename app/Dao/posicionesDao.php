<?php 
include_once($_SERVER["DOCUMENT_ROOT"]."/maps/app/db/db_connection.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/maps/app/Entities/posiciones.php");

/** 
*	this class manage the entire info of the entity Posicion.
*/
class PosicionesDao extends Connection{

	public static function createPosition($posicion){
		$cnx = Connection::connect();
		$sql = "INSERT INTO positions ( lat , lng ) VALUES ( {$posicion->getLat() } , {$posicion->getLng() } ) " ;
		return $cnx->query($sql);
	} 

}