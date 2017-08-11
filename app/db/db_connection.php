<?php 

class Connection {
	private const dbname = "googleMaps";
	private const host = "localhost";
	private const user = "root";
	private const password = "";
	private $connection;

	function __construct() {
		try {
			$this->connection =  new PDO("mysql:host=".self::host.";dbname=".self::dbname, self::user, self::password);  
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function getConnection() {
		return $this->connection;
	}
	
}
