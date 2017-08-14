<?php 

namespace App\DAO\Posiciones;

use App\Database\Connection;
use App\Model\Posicion;

/** 
*	this class manage the entire info of the entity Posicion.
*/
class Posiciones {

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
		if(!$this->positionExist($posicion->getLat(), $posicion->getLng())) {
			$sql = "INSERT INTO positions (lat, lng) VALUES ({$posicion->getLat()}, {$posicion->getLng()})";
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