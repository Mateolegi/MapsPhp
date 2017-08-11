<?php 
include_once($_SERVER["DOCUMENT_ROOT"]."/MapsPhp/app/db/db_connection.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/MapsPhp/app/Entities/posiciones.php");

/** 
*	this class manage the entire info of the entity Posicion.
*/
class PosicionesDao {

	private  $connection;

	function __construct() {
		$db = new Connection();
		$this->connection = $db->getConnection();
	}

	function __destruct(){
		$this->connection=null;
	}

// Main methods
	public function createPosition($posicion){

		if(!self::positionExist( $posicion->getLat() , $posicion->getLng() )) {
			$sql = "INSERT INTO positions ( lat , lng ) VALUES ( {$posicion->getLat() } , {$posicion->getLng() } ) " ;
			$this->connection->query($sql);
			return false;
		}
		return true;
	} 

	public  function searchPosition() {
		$sql = "SELECT * FROM positions";
		return $this->connection->query($sql);
	}

	public function positionExist($lat, $lng) {
		$sql = "SELECT * FROM positions WHERE  lat = '{$lat}' AND lng = '{$lng}'";
		$sql =  $this->connection->prepare($sql);
		$sql->execute();
		return $sql ->rowCount() > 0;
	}

}