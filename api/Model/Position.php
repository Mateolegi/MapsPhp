<?php

namespace App\Model\Position;

/**
* This class represent the entity of Posiciones
*/
class Position{

	private $connection;
	private $tableName = "positions";

	public $lat;
	public $lng;

	function __construct($db [, $lat, $lng]) {
		$this->connection = $db;
		if ($lat && $lng) {
			$this->lat = $lat;
			$this->lng = $lng;
		}
	}
}

