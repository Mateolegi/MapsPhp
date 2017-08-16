<?php

/**
* Represent the coords storaged in database as a PHP model
*/
class Position {

	private $conn;
	private $table_name = "positions";

	public $id;
	public $latitude;
	public $longitude;

	function __construct($db) {
		$this->conn = $db;
	}

	function read() {
		$query = "SELECT id, lat, lng FROM positions";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		return $stmt;
	}

	function positionExist() {
		$query = "SELECT id, lat, lng FROM positions WHERE lat=:lat AND lng=:lng";
		$stmt = $this->conn->prepare($query);
		$this->latitude = htmlspecialchars(strip_tags($this->latitude));
		$this->longitude = htmlspecialchars(strip_tags($this->longitude));
		$stmt->bindParam(":lat", $this->latitude);
		$stmt->bindParam(":lng", $this->longitude);
		$stmt->execute();

		$num = $stmt->rowCount();

		return $num > 0;
	}

	function create() {
		if ($this->positionExist()) {
			return "Position was already created.";
		} else {
			$query = "INSERT INTO {$this->table_name} (lat, lng) VALUES (:lat, :lng)";
			$stmt = $this->conn->prepare($query);

			$this->latitude = htmlspecialchars(strip_tags($this->latitude));
			$this->longitude = htmlspecialchars(strip_tags($this->longitude));

			$stmt->bindParam(":lat", $this->latitude);
			$stmt->bindParam(":lng", $this->longitude);

			if ($stmt->execute()) {
				return "Position was created.";
			} else {
				return "Unable to create position.";
			}
		}
	}

	function readOne() {
		$query = "SELECT id, lat, lng FROM positions WHERE id = ? LIMIT 0,1";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->id = $row['id'];
		$this->latitude = $row['lat'];
		$this->longitude = $row['lng'];
	}

	function update() {
		$query = "UPDATE {$this->table_name} SET lat = :lat, lng = :lng WHERE id = :id";
		$stmt = $this->conn->prepare($query);

		$this->latitude = htmlspecialchars(strip_tags($this->latitude));
		$this->longitude = htmlspecialchars(strip_tags($this->longitude));

		$stmt->bindParam(':lat', $this->latitude);
		$stmt->bindParam(':lng', $this->longitude);
		$stmt->bindParam(':id', $this->id);

		return $stmt->execute();
	}

	function delete() {
		$query = "DELETE FROM {$this->table_name} WHERE id = ?";

		$stmt = $this->conn->prepare($query);

		$this->id = htmlspecialchars(strip_tags($this->id));
		$stmt->bindParam(1, $this->id);

		return $stmt->execute();
	}

	function search($keywords) {
		$query = "SELECT id, lat, lng FROM {$this->table_name} WHERE lat LIKE ? OR lng LIKE ?";
		$stmt = $this->conn->prepare($query);

		$keywords = htmlspecialchars(strip_tags($keywords));
		$keywords = "%{$keywords}%";

		$stmt->bindParam(1, $keywords);
		$stmt->bindParam(2, $keywords);

		$stmt->execute();
		return $stmt;
	}
}

?>