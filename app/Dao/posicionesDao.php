<?php 

include_once("../Db/db_connection.php");
include_once("../Entities/posiciones.php");
/**
* 
*/
class PosicionesDao extends Connection{
	protected $cnx = null;

	public static function getConnection(){
		$this->$cnx = Connection::connect();
	}


	public static function createPosition($posicion){
		// $query = "INSERT INTO positions (lat, lng) VALUES ($posicion->lat,$posicion->lng)";
		echo $posicion->lat. "<br>". $posicion->lng;

	} 

}