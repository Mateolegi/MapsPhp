<?php

/**
* Connection to the database
*/
class Database {
	
	private $host = 'localhost';
	private $name = 'heatmap';
	private $user = 'root';
	private $pass = '1215';
	public $conn;

	public function getConnection()	{
		$this->conn = null;

		try {
			$this->conn = new PDO("mysql:host={$this->host};dbname={$this->name}", $this->user, $this->pass);
			$this->conn->exec("set names utf8");
		} catch (PDOException $e) {
			echo "Connection error: " . $e->getMessage();
		}
		return $this->conn;
	}
}