<?php

namespace App\Database;

class Connection {
	private $name = "heatmap";
	private $host = "localhost";
	private $user = "root";
	private $pass = "1215	";
	private $connection;

	function getCredentials()	{
		$arr = \parse_ini_file('../../.env', true);
		$this->name = $arr['database']['name'];
		$this->host = $arr['database']['host'];
		$this->user = $arr['database']['user'];
		$this->pass = $arr['database']['pass'];
	}

	public function getConnection() {
		$this->connection = null;
		$this->getCredentials();
		try {
			$this->connection = new PDO("mysql:host=".$this->host.";dbname=".$this->name, $this->user, $this->pass);
			$this->connection->exec("set names utf8");
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		return $this->connection;
	}

}
