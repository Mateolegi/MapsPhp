<?php 

namespace App\Database\Connection;

class Connection {
	private const dbname = "heatmap";
	private const host = "localhost";
	private const user = "root";
	private const password = "1215	";
	private $connection;

	public function getConnection() {
		$this->connection = null;
		try {
			$this->connection = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->user, $this->password);
			$this->connection->exec("set names utf8");  
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		return $this->connection;
	}
	
}
