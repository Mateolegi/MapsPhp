<?php 

class Connection {

	private const localhost = 'mysql:host=localhost;dbname=googleMaps';
	private const user = "root";
	private const password = "";

	public static function connect (){
		try {
			$cn = new PDO(self::localhost, self::user, self::password);
			echo "i'm working";

		} catch (PDOException $e) {
				echo $e->getMessage();
		}
	}
}

Connection::connect();