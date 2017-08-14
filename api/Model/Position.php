<?php

namespace App\Model;

/**
* This class represent the entity of Posiciones
*/
class Position{

	private $connection;
	private $tableName = "positions";

	public $id;
	public $lat;
	public $lng;

	function __construct($lat = null, $lng = null) {
		// $this->connection = $db;
		$this->lat = $lat;
		$this->lng = $lng;
	}

	public function toJSON() {

	}
}
